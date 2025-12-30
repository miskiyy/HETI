import warnings
warnings.filterwarnings("ignore")

import numpy as np
import pandas as pd

from dataclasses import dataclass
from typing import Tuple, Dict, List

from sklearn.model_selection import TimeSeriesSplit
from sklearn.pipeline import Pipeline
from sklearn.preprocessing import StandardScaler
from sklearn.impute import SimpleImputer
from sklearn.linear_model import LogisticRegression
from sklearn.ensemble import RandomForestClassifier, HistGradientBoostingClassifier
from sklearn.metrics import (
    accuracy_score, precision_score, recall_score, f1_score,
    confusion_matrix, classification_report
)

# -----------------------------
# 1) FEATURE ENGINEERING HELPERS
# -----------------------------

def ema(series: pd.Series, span: int) -> pd.Series:
    return series.ewm(span=span, adjust=False).mean()

def rsi(close: pd.Series, period: int = 14) -> pd.Series:
    delta = close.diff()
    gain = np.where(delta > 0, delta, 0.0)
    loss = np.where(delta < 0, -delta, 0.0)
    gain_ema = pd.Series(gain, index=close.index).rolling(period).mean()
    loss_ema = pd.Series(loss, index=close.index).rolling(period).mean()
    rs = gain_ema / (loss_ema + 1e-9)
    return 100 - (100 / (1 + rs))

def true_range(df: pd.DataFrame) -> pd.Series:
    prev_close = df["close"].shift(1)
    tr1 = df["high"] - df["low"]
    tr2 = (df["high"] - prev_close).abs()
    tr3 = (df["low"] - prev_close).abs()
    return pd.concat([tr1, tr2, tr3], axis=1).max(axis=1)

def atr(df: pd.DataFrame, period: int = 14) -> pd.Series:
    return true_range(df).rolling(period).mean()

def add_features(df: pd.DataFrame) -> pd.DataFrame:
    out = df.copy()

    # Returns & momentum
    out["ret_1"] = out["close"].pct_change(1)
    out["ret_5"] = out["close"].pct_change(5)
    out["ret_10"] = out["close"].pct_change(10)

    # Volatility (rolling std)
    out["vol_10"] = out["ret_1"].rolling(10).std()
    out["vol_20"] = out["ret_1"].rolling(20).std()

    # Moving averages & distance to MA
    out["sma_10"] = out["close"].rolling(10).mean()
    out["sma_20"] = out["close"].rolling(20).mean()
    out["sma_50"] = out["close"].rolling(50).mean()
    out["dist_sma_20"] = (out["close"] - out["sma_20"]) / (out["sma_20"] + 1e-9)
    out["dist_sma_50"] = (out["close"] - out["sma_50"]) / (out["sma_50"] + 1e-9)

    # EMA / MACD
    out["ema_12"] = ema(out["close"], 12)
    out["ema_26"] = ema(out["close"], 26)
    out["macd"] = out["ema_12"] - out["ema_26"]
    out["macd_signal"] = ema(out["macd"], 9)
    out["macd_hist"] = out["macd"] - out["macd_signal"]

    # RSI
    out["rsi_14"] = rsi(out["close"], 14)

    # ATR & range features
    out["atr_14"] = atr(out, 14)
    out["range_pct"] = (out["high"] - out["low"]) / (out["close"] + 1e-9)

    # Volume features
    out["vol_sma_20"] = out["volume"].rolling(20).mean()
    out["vol_ratio"] = out["volume"] / (out["vol_sma_20"] + 1e-9)

    # Candle features
    out["body"] = (out["close"] - out["open"]) / (out["open"] + 1e-9)
    out["upper_wick"] = (out["high"] - out[["close","open"]].max(axis=1)) / (out["close"] + 1e-9)
    out["lower_wick"] = (out[["close","open"]].min(axis=1) - out["low"]) / (out["close"] + 1e-9)

    return out

def make_label(df: pd.DataFrame, horizon: int = 5, threshold: float = 0.01) -> pd.Series:
    future_close = df["close"].shift(-horizon)
    fwd_ret = (future_close / df["close"]) - 1.0
    return (fwd_ret >= threshold).astype(int)

# -----------------------------
# 2) LOAD DATA
# -----------------------------

def load_data(path: str) -> pd.DataFrame:
    df = pd.read_csv(path)
    df["date"] = pd.to_datetime(df["date"])
    df = df.sort_values("date").reset_index(drop=True)
    for c in ["open","high","low","close","volume"]:
        df[c] = pd.to_numeric(df[c], errors="coerce")
    return df

# -----------------------------
# 3) WALK-FORWARD BACKTEST
# -----------------------------

@dataclass
class EvalResult:
    fold: int
    start_train: str
    end_train: str
    start_test: str
    end_test: str
    accuracy: float
    precision: float
    recall: float
    f1: float

def build_model(model_name: str):
    # Pipelines: impute -> scale -> classifier
    if model_name == "logreg":
        clf = LogisticRegression(max_iter=2000, class_weight="balanced")
    elif model_name == "rf":
        clf = RandomForestClassifier(
            n_estimators=400,
            max_depth=10,
            min_samples_leaf=5,
            random_state=42,
            class_weight="balanced_subsample",
            n_jobs=-1
        )
    elif model_name == "hgb":
        clf = HistGradientBoostingClassifier(
            max_depth=6,
            learning_rate=0.06,
            max_iter=400,
            random_state=42
        )
    else:
        raise ValueError("Unknown model_name")

    pipe = Pipeline([
        ("imputer", SimpleImputer(strategy="median")),
        ("scaler", StandardScaler()),
        ("clf", clf)
    ])
    return pipe

def walk_forward_eval(df: pd.DataFrame, feature_cols: List[str], target_col: str,
                      n_splits: int = 6, model_name: str = "hgb") -> Tuple[pd.DataFrame, np.ndarray, np.ndarray]:
    X = df[feature_cols].copy()
    y = df[target_col].astype(int).values

    tscv = TimeSeriesSplit(n_splits=n_splits)

    results: List[EvalResult] = []
    all_true = []
    all_pred = []

    model = build_model(model_name)

    for fold, (train_idx, test_idx) in enumerate(tscv.split(X), start=1):
        X_train, X_test = X.iloc[train_idx], X.iloc[test_idx]
        y_train, y_test = y[train_idx], y[test_idx]

        model.fit(X_train, y_train)
        pred = model.predict(X_test)

        acc = accuracy_score(y_test, pred)
        prec = precision_score(y_test, pred, zero_division=0)
        rec = recall_score(y_test, pred, zero_division=0)
        f1 = f1_score(y_test, pred, zero_division=0)

        results.append(EvalResult(
            fold=fold,
            start_train=str(df.loc[train_idx[0], "date"].date()),
            end_train=str(df.loc[train_idx[-1], "date"].date()),
            start_test=str(df.loc[test_idx[0], "date"].date()),
            end_test=str(df.loc[test_idx[-1], "date"].date()),
            accuracy=acc, precision=prec, recall=rec, f1=f1
        ))

        all_true.append(y_test)
        all_pred.append(pred)

    res_df = pd.DataFrame([r.__dict__ for r in results])
    y_true_all = np.concatenate(all_true)
    y_pred_all = np.concatenate(all_pred)
    return res_df, y_true_all, y_pred_all

# -----------------------------
# 4) MAIN RUN
# -----------------------------

if __name__ == "__main__":
    PATH = "bbca_dataset.csv"

    raw = load_data(PATH)

    # If label not provided, generate it fairly
    if "label" not in raw.columns:
        raw["label"] = make_label(raw, horizon=5, threshold=0.01)

    feat = add_features(raw)

    # Drop rows with NaNs from rolling indicators + last horizon rows (label shift)
    feat = feat.dropna().reset_index(drop=True)

    # Feature columns
    feature_cols = [
        "ret_1","ret_5","ret_10","vol_10","vol_20",
        "sma_10","sma_20","sma_50","dist_sma_20","dist_sma_50",
        "ema_12","ema_26","macd","macd_signal","macd_hist",
        "rsi_14","atr_14","range_pct",
        "vol_sma_20","vol_ratio",
        "body","upper_wick","lower_wick"
    ]

    # Sanity check
    feat = feat.replace([np.inf, -np.inf], np.nan)

    # Evaluate with walk-forward
    fold_df, y_true, y_pred = walk_forward_eval(
        feat, feature_cols=feature_cols, target_col="label",
        n_splits=6, model_name="hgb"  # try: logreg / rf / hgb
    )

    # Overall metrics
    overall_acc = accuracy_score(y_true, y_pred)
    overall_prec = precision_score(y_true, y_pred, zero_division=0)
    overall_rec = recall_score(y_true, y_pred, zero_division=0)
    overall_f1 = f1_score(y_true, y_pred, zero_division=0)
    cm = confusion_matrix(y_true, y_pred)

    print("\n=== WALK-FORWARD RESULTS PER FOLD ===")
    print(fold_df.to_string(index=False))

    print("\n=== OVERALL METRICS (ALL FOLDS COMBINED) ===")
    print(f"Accuracy  : {overall_acc:.4f}")
    print(f"Precision : {overall_prec:.4f}")
    print(f"Recall    : {overall_rec:.4f}")
    print(f"F1-score  : {overall_f1:.4f}")

    print("\nConfusion Matrix:")
    print(cm)

    print("\nClassification Report:")
    print(classification_report(y_true, y_pred, zero_division=0))

    # Export artifacts for judges
    fold_df.to_csv("nova_walkforward_folds.csv", index=False)

    with open("nova_validation_report.txt", "w", encoding="utf-8") as f:
        f.write("Nova Capital — Validation Report (Walk-Forward / TimeSeriesSplit)\n")
        f.write("===============================================================\n\n")
        f.write("Per-fold metrics:\n")
        f.write(fold_df.to_string(index=False))
        f.write("\n\nOverall metrics:\n")
        f.write(f"Accuracy  : {overall_acc:.4f}\n")
        f.write(f"Precision : {overall_prec:.4f}\n")
        f.write(f"Recall    : {overall_rec:.4f}\n")
        f.write(f"F1-score  : {overall_f1:.4f}\n\n")
        f.write("Confusion Matrix:\n")
        f.write(np.array2string(cm))
        f.write("\n\nClassification Report:\n")
        f.write(classification_report(y_true, y_pred, zero_division=0))

    print("\nSaved: nova_walkforward_folds.csv, nova_validation_report.txt")
