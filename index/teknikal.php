<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Nova Capital — Modul Analisis Teknikal</title>
  <style>
    :root{
      --bg0:#050a16;
      --bg1:#071027;
      --panel:#0b1633cc;
      --panel2:#0b163399;
      --stroke:#1d2b52;
      --text:#eaf1ff;
      --muted:#9fb2d6;
      --muted2:#7f93bc;
      --green:#20d37a;
      --green2:#16b864;
      --red:#ff4d6d;
      --yellow:#ffd166;
      --blue:#4ea1ff;
      --shadow: 0 18px 60px rgba(0,0,0,.45);
      --radius: 18px;
      --radius2: 14px;
      --pad: 18px;
      --pad2: 14px;
      --font: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Apple Color Emoji","Segoe UI Emoji";
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      font-family:var(--font);
      color:var(--text);
      background:
        radial-gradient(900px 600px at 22% 18%, #0f2d6d35 0%, transparent 55%),
        radial-gradient(900px 600px at 80% 20%, #0f7a5a25 0%, transparent 55%),
        radial-gradient(1200px 800px at 60% 85%, #2b3fff18 0%, transparent 60%),
        linear-gradient(180deg, var(--bg0), var(--bg1));
      min-height:100vh;
    }
    a{color:inherit; text-decoration:none}
    .wrap{
      max-width: 1280px;
      margin: 0 auto;
      padding: 22px 18px 44px;
    }

    /* Topbar */
    .topbar{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:16px;
      padding: 10px 6px 18px;
    }
    .brand{
      display:flex; gap:12px; align-items:center;
    }
    .logo{
      width:42px;height:42px;border-radius:12px;
      background: linear-gradient(135deg, #0f4cff, #19d38a);
      display:grid; place-items:center;
      box-shadow: 0 10px 30px rgba(0,0,0,.35);
    }
    .logo svg{filter: drop-shadow(0 6px 16px rgba(0,0,0,.35))}
    .brand h1{
      font-size: 18px; margin:0; letter-spacing:.2px;
    }
    .brand p{margin:2px 0 0; color:var(--muted); font-size:12.5px}
    .actions{
      display:flex; align-items:center; gap:10px; flex-wrap:wrap;
    }
    .pill{
      display:flex; align-items:center; gap:8px;
      background: rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.08);
      padding: 10px 12px;
      border-radius: 999px;
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0,0,0,.25);
      color:var(--muted);
      font-size:13px;
      cursor:pointer;
      user-select:none;
    }
    .pill strong{color:var(--text); font-weight:600}
    .pill .dot{
      width:8px;height:8px;border-radius:50%;
      background: var(--green);
      box-shadow: 0 0 0 6px rgba(32,211,122,.12);
    }
    .btn{
      background: linear-gradient(180deg, #152a58, #0f1f44);
      border:1px solid rgba(255,255,255,.08);
      padding: 10px 14px;
      border-radius: 999px;
      color:var(--text);
      font-weight:600;
      cursor:pointer;
      box-shadow: 0 10px 30px rgba(0,0,0,.25);
    }
    .btn.secondary{
      background: rgba(255,255,255,.06);
      color:var(--text);
    }

    /* Grid layout */
    .grid{
      display:grid;
      grid-template-columns: 360px 1fr;
      gap: 18px;
      align-items:start;
    }
    @media (max-width: 1100px){
      .grid{grid-template-columns: 1fr}
    }

    /* Panels */
    .panel{
      background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
      border: 1px solid rgba(255,255,255,.08);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      backdrop-filter: blur(12px);
    }
    .panel .hd{
      padding: 16px var(--pad);
      border-bottom: 1px solid rgba(255,255,255,.07);
      display:flex; align-items:center; justify-content:space-between;
      gap:10px;
    }
    .panel .hd h2{
      font-size: 14px; margin:0; letter-spacing:.2px
    }
    .panel .hd span{
      font-size:12px; color:var(--muted)
    }
    .panel .bd{padding: var(--pad)}

    /* Form */
    .form{
      display:grid; gap:12px;
    }
    label{
      display:block;
      font-size: 12px;
      color: var(--muted);
      margin-bottom: 6px;
    }
    .row{display:grid; grid-template-columns: 1fr 1fr; gap: 12px}
    @media (max-width: 520px){ .row{grid-template-columns: 1fr} }
    .field{
      background: rgba(0,0,0,.20);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 14px;
      padding: 10px 12px;
      color: var(--text);
      outline: none;
      width: 100%;
    }
    .field::placeholder{color: rgba(234,241,255,.45)}
    select.field{appearance:none}
    .seg{
      display:flex; gap:8px; flex-wrap:wrap;
    }
    .chip{
      border:1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.05);
      color: var(--muted);
      padding: 8px 10px;
      border-radius: 999px;
      font-size: 12px;
      cursor:pointer;
      user-select:none;
    }
    .chip.active{
      background: rgba(32,211,122,.15);
      border-color: rgba(32,211,122,.35);
      color: var(--text);
    }
    .primary{
      width:100%;
      background: linear-gradient(180deg, var(--green), var(--green2));
      border: none;
      color:#062015;
      font-weight:800;
      padding: 13px 14px;
      border-radius: 999px;
      cursor:pointer;
      box-shadow: 0 14px 40px rgba(32,211,122,.25);
      letter-spacing:.2px;
    }
    .help{
      font-size: 12px; color: var(--muted2); line-height: 1.4;
    }

    /* Main content: header summary cards */
    .cards{
      display:grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
      padding: 16px;
    }
    @media (max-width: 1100px){
      .cards{grid-template-columns: repeat(2, 1fr)}
    }
    @media (max-width: 520px){
      .cards{grid-template-columns: 1fr}
    }
    .card{
      background: rgba(0,0,0,.22);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 16px;
      padding: 14px;
      min-height: 92px;
    }
    .k{font-size:12px; color:var(--muted); margin-bottom:8px; display:flex; align-items:center; gap:8px}
    .v{font-size:20px; font-weight:800; letter-spacing:.2px; display:flex; align-items:baseline; gap:10px}
    .v small{font-size:12px; color:var(--muted)}
    .badge{
      font-size: 12px;
      padding: 4px 8px;
      border-radius: 999px;
      border:1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      color: var(--muted);
    }
    .pos{color:var(--green)}
    .neg{color:var(--red)}
    .warn{color:var(--yellow)}
    .line{
      height:1px; background: rgba(255,255,255,.07); margin: 10px 0;
    }

    /* Chart block */
    .chart-wrap{padding: 0 16px 16px}
    .chart{
      background: rgba(0,0,0,.26);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: var(--radius);
      padding: 12px;
      position:relative;
      overflow:hidden;
      min-height: 420px;
    }
    .chart-top{
      display:flex; align-items:center; justify-content:space-between;
      gap:10px; flex-wrap:wrap;
      margin-bottom: 10px;
    }
    .chart-left{
      display:flex; align-items:center; gap:10px; flex-wrap:wrap;
    }
    .ticker{
      font-weight:900; letter-spacing:.6px;
      font-size: 16px;
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.10);
      padding: 8px 10px;
      border-radius: 999px;
    }
    .tf{
      display:flex; gap:6px; flex-wrap:wrap;
    }
    .tf button{
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.10);
      color: var(--muted);
      padding: 8px 10px;
      border-radius: 999px;
      cursor:pointer;
      font-size:12px;
    }
    .tf button.active{
      background: rgba(78,161,255,.14);
      border-color: rgba(78,161,255,.35);
      color: var(--text);
    }
    .chart-right{
      display:flex; gap:8px; flex-wrap:wrap;
    }
    .iconbtn{
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.10);
      color: var(--text);
      padding: 8px 10px;
      border-radius: 999px;
      cursor:pointer;
      font-size:12px;
    }
    .chart-body{
      border-radius: 14px;
      border: 1px dashed rgba(255,255,255,.12);
      background: linear-gradient(180deg, rgba(78,161,255,.06), rgba(32,211,122,.04));
      min-height: 340px;
      display:grid;
      place-items:center;
      position:relative;
      overflow:hidden;
    }
    .chart-body .placeholder{
      text-align:center;
      padding: 22px;
      max-width: 520px;
      color: var(--muted);
      line-height: 1.5;
      font-size: 13px;
    }
    .chart-body .placeholder strong{color:var(--text)}
    .spark{
      position:absolute; inset:-40px -40px auto auto;
      width: 260px; height: 260px;
      background: radial-gradient(circle at 30% 30%, rgba(32,211,122,.35), transparent 60%),
                  radial-gradient(circle at 70% 70%, rgba(78,161,255,.25), transparent 60%);
      filter: blur(12px);
      opacity: .7;
      transform: rotate(12deg);
    }
    .footnote{
      text-align:center;
      color: var(--muted2);
      font-size:12px;
      margin-top: 10px;
    }

    /* Analysis grid */
    .analysis{
      display:grid;
      grid-template-columns: 1.35fr 1fr;
      gap: 12px;
      padding: 0 16px 16px;
    }
    @media (max-width: 900px){
      .analysis{grid-template-columns: 1fr}
    }
    .box{
      background: rgba(0,0,0,.22);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 16px;
      padding: 14px;
    }
    .box h3{
      margin:0 0 10px;
      font-size: 13px;
      letter-spacing:.2px;
    }
    .grid3{
      display:grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
    }
    @media (max-width: 520px){
      .grid3{grid-template-columns: 1fr}
    }
    .metric{
      background: rgba(255,255,255,.05);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 14px;
      padding: 10px;
      min-height: 76px;
    }
    .metric .t{font-size:12px; color:var(--muted); margin-bottom:6px}
    .metric .n{font-size:18px; font-weight:800}
    .metric .s{font-size:12px; color:var(--muted2); margin-top:4px}
    .lvl{
      display:grid;
      grid-template-columns: 1fr auto;
      gap: 8px;
      align-items:center;
      padding: 8px 10px;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,.08);
      background: rgba(255,255,255,.05);
      margin-bottom: 8px;
    }
    .lvl:last-child{margin-bottom:0}
    .lvl .name{font-size:12px; color:var(--muted)}
    .lvl .price{font-weight:900}
    .lvl.support .price{color: var(--green)}
    .lvl.resist .price{color: var(--red)}
    .tag{
      font-size: 11px;
      padding: 4px 8px;
      border-radius: 999px;
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.10);
      color: var(--muted);
      margin-left: 8px;
    }

    /* Signal + risk */
    .signal{
      display:grid;
      grid-template-columns: 1fr;
      gap: 10px;
    }
    .signal .row2{
      display:grid; grid-template-columns: 1fr 1fr; gap: 10px;
    }
    @media (max-width: 520px){ .signal .row2{grid-template-columns:1fr} }
    .kv{
      background: rgba(255,255,255,.05);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 14px;
      padding: 10px;
    }
    .kv .k2{font-size:12px;color:var(--muted)}
    .kv .v2{margin-top:6px;font-weight:900;font-size:16px}
    .pill2{
      display:inline-flex; align-items:center; gap:8px;
      padding: 8px 10px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      font-size: 12px;
      color: var(--muted);
    }
    .pill2 .dot{width:8px;height:8px;border-radius:50%}
    .dot.buy{background: var(--green)}
    .dot.wait{background: var(--yellow)}
    .dot.sell{background: var(--red)}
    .bar{
      height: 10px;
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 999px;
      overflow:hidden;
      margin-top: 8px;
    }
    .bar > div{
      height:100%;
      width: 0%;
      background: linear-gradient(90deg, rgba(255,77,109,.95), rgba(255,209,102,.95), rgba(32,211,122,.95));
    }
    .checklist{
      display:grid; gap:8px;
      margin-top: 8px;
    }
    .check{
      display:flex; align-items:center; justify-content:space-between; gap:10px;
      background: rgba(255,255,255,.04);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 12px;
      padding: 8px 10px;
      font-size: 12px;
      color: var(--muted);
    }
    .check strong{color: var(--text); font-weight:700}
    .status{
      font-size:11px;
      padding: 4px 8px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      color: var(--muted);
      white-space:nowrap;
    }
    .status.ok{border-color: rgba(32,211,122,.35); background: rgba(32,211,122,.14); color: var(--text)}
    .status.bad{border-color: rgba(255,77,109,.35); background: rgba(255,77,109,.12); color: var(--text)}
    .status.mid{border-color: rgba(255,209,102,.35); background: rgba(255,209,102,.12); color: var(--text)}
    .muted{color: var(--muted2); font-size:12px; line-height:1.45}

    /* Watchlist */
    .watch{
      display:grid; gap:8px; margin-top: 10px;
    }
    .witem{
      display:flex; align-items:center; justify-content:space-between; gap:10px;
      padding: 10px;
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.08);
      background: rgba(255,255,255,.04);
    }
    .witem .l{
      display:flex; flex-direction:column; gap:2px;
    }
    .witem .l strong{letter-spacing:.4px}
    .witem .l span{font-size:12px; color:var(--muted)}
    .witem .r{
      text-align:right;
      display:flex; flex-direction:column; gap:2px;
      font-size:12px;
      color:var(--muted);
    }
    .witem .r strong{font-size:13px; color:var(--text)}
    .mini{
      display:flex; gap:8px; flex-wrap:wrap;
    }
    .mini .chip{padding:6px 10px}

  </style>
</head>
<body>
  <div class="wrap">
    <!-- Top bar -->
    <div class="topbar">
      <div class="brand">
        <div class="logo" aria-hidden="true">
          <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
            <path d="M4 17V7" stroke="white" stroke-width="2" stroke-linecap="round"/>
            <path d="M4 17H20" stroke="white" stroke-width="2" stroke-linecap="round"/>
            <path d="M7 13l3-3 3 3 5-6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <div>
          <h1>Nova Capital</h1>
          <p>Modul Analisis Teknikal — keputusan lebih terarah, risiko lebih terkendali</p>
        </div>
      </div>

      <div class="actions">
        <div class="pill" id="themeBtn" title="Toggle mode">
          <span>🌙</span> <span><strong>Mode</strong> Gelap</span>
        </div>
        <div class="pill" title="Status modul">
          <span class="dot"></span> <span><strong>Teknikal</strong> Analisis</span>
        </div>
        <button class="btn secondary" type="button" onclick="alert('Navigasi: kembali ke Home (dummy)')">← Kembali ke Home</button>
      </div>
    </div>

    <div class="grid">
      <!-- LEFT: Settings -->
      <div class="panel">
        <div class="hd">
          <h2>Pengaturan Analisis</h2>
          <span>Input & preferensi</span>
        </div>
        <div class="bd">
          <div class="form">
            <div>
              <label for="kode">Kode Saham</label>
              <input id="kode" class="field" value="BBCA" placeholder="Contoh: BBCA, BBRI, TLKM" />
            </div>

            <div class="row">
              <div>
                <label for="tfutama">Timeframe Utama</label>
                <select id="tfutama" class="field">
                  <option selected>Daily (D1)</option>
                  <option>4 Jam (H4)</option>
                  <option>1 Jam (H1)</option>
                  <option>30 Menit (M30)</option>
                </select>
              </div>
              <div>
                <label for="profil">Profil Risiko</label>
                <select id="profil" class="field">
                  <option>Konservatif</option>
                  <option selected>Moderat</option>
                  <option>Agresif</option>
                </select>
              </div>
            </div>

            <div>
              <label>Timeframe Pendukung</label>
              <div class="seg" id="tfSupport">
                <div class="chip active" data-v="D1">D1</div>
                <div class="chip" data-v="W1">W1</div>
                <div class="chip" data-v="M1">M1</div>
              </div>
              <div class="help" style="margin-top:8px">
                Timeframe pendukung dipakai untuk <b>konfirmasi tren</b> (misalnya D1 dikonfirmasi oleh W1).
              </div>
            </div>

            <div>
              <label>Paket Analisis</label>
              <div class="seg" id="plan">
                <div class="chip active" data-v="premium">Premium</div>
                <div class="chip" data-v="free">Free</div>
                <div class="chip" data-v="pro">Pro</div>
              </div>
              <div class="help" style="margin-top:8px">
                *Demo UI: batas fitur akan menyesuaikan paket (dummy).
              </div>
            </div>

            <button class="primary" id="runBtn">Terapkan Analisis</button>
            <div class="help">
              Output angka (RSI, MACD, Support/Resistance, Entry/SL/TP) biasanya berasal dari engine analisis (Python/Backend).
              Di demo ini, nilainya contoh agar UI terlihat lengkap.
            </div>

            <div class="line"></div>

            <div class="box" style="padding:12px">
              <h3 style="margin:0 0 8px; font-size:13px">Watchlist Cepat</h3>
              <div class="watch" id="watchlist">
                <div class="witem">
                  <div class="l"><strong>BBCA</strong><span>Bank Central Asia</span></div>
                  <div class="r"><strong>8.025</strong><span class="pos">+0,62%</span></div>
                </div>
                <div class="witem">
                  <div class="l"><strong>BBRI</strong><span>Bank Rakyat Indonesia</span></div>
                  <div class="r"><strong>5.260</strong><span class="neg">-0,38%</span></div>
                </div>
                <div class="witem">
                  <div class="l"><strong>TLKM</strong><span>Telkom Indonesia</span></div>
                  <div class="r"><strong>3.180</strong><span class="pos">+1,12%</span></div>
                </div>
              </div>
              <div class="mini" style="margin-top:10px">
                <div class="chip">+ Tambah</div>
                <div class="chip">Set Alert</div>
                <div class="chip">Export</div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- RIGHT: Main analysis -->
      <div class="panel">
        <div class="hd">
          <h2>Ringkasan Analisis</h2>
          <span>Harga • Tren • Momentum • Level • Risiko</span>
        </div>

        <!-- Summary Cards -->
        <div class="cards" id="summaryCards">
          <div class="card">
            <div class="k">Harga Terakhir <span class="badge">IDX</span></div>
            <div class="v"><span id="lastPrice">8.025</span> <small id="chg" class="pos">+50 (+0,62%)</small></div>
            <div class="line"></div>
            <div class="k">Volume <span class="badge">D1</span></div>
            <div class="v"><span id="vol">71,26M</span> <small class="muted">rata-rata: 63,1M</small></div>
          </div>

          <div class="card">
            <div class="k">Trend Utama <span class="badge">MA</span></div>
            <div class="v"><span id="trend" class="pos">Bullish</span> <small class="muted">MA20 > MA50</small></div>
            <div class="line"></div>
            <div class="k">Trend Score</div>
            <div class="v"><span id="trendScore">72</span><small class="muted">/ 100</small></div>
          </div>

          <div class="card">
            <div class="k">Momentum <span class="badge">RSI</span></div>
            <div class="v"><span id="rsi">58,4</span> <small class="muted">netral-bullish</small></div>
            <div class="line"></div>
            <div class="k">Volatilitas <span class="badge">ATR</span></div>
            <div class="v"><span id="atr">145</span> <small class="muted">± per hari</small></div>
          </div>

          <div class="card">
            <div class="k">Sinyal Utama</div>
            <div class="v">
              <span class="pill2"><span class="dot wait"></span><span id="signalTxt">Wait / Confirm</span></span>
            </div>
            <div class="line"></div>
            <div class="k">Confidence</div>
            <div class="v"><span id="conf">64</span><small class="muted">/ 100</small></div>
            <div class="bar"><div id="confBar"></div></div>
          </div>
        </div>

        <!-- Chart -->
        <div class="chart-wrap">
          <div class="chart">
            <div class="chart-top">
              <div class="chart-left">
                <div class="ticker" id="tickerLabel">BBCA</div>
                <div class="tf" id="tfButtons">
                  <button class="active" data-v="1D">1D</button>
                  <button data-v="1H">1H</button>
                  <button data-v="30m">30m</button>
                  <button data-v="15m">15m</button>
                </div>
              </div>
              <div class="chart-right">
                <button class="iconbtn" type="button" onclick="alert('Buka indikator (dummy)')">Indicators</button>
                <button class="iconbtn" type="button" onclick="alert('Snapshot (dummy)')">📸</button>
                <button class="iconbtn" type="button" onclick="alert('Fullscreen (dummy)')">⛶</button>
              </div>
            </div>

            <div class="chart-body">
              <div class="spark" aria-hidden="true"></div>
              <div class="placeholder">
                <strong>Chart placeholder</strong><br/>
                Kamu bisa ganti bagian ini dengan <b>TradingView Embed</b> atau chart library (Chart.js / Lightweight Charts).<br/>
                UI di bawah sudah siap menampilkan angka & sinyal dari engine analisis.
              </div>
            </div>

            <div class="footnote">*Demo UI • Angka contoh. Tidak merupakan rekomendasi beli/jual.</div>
          </div>
        </div>

        <!-- Analysis sections -->
        <div class="analysis">
          <!-- Left: Levels + Indicators -->
          <div class="box">
            <h3>Level Harga & Konfirmasi Indikator</h3>

            <div class="grid3" style="margin-bottom:12px">
              <div class="metric">
                <div class="t">Support Terdekat</div>
                <div class="n" id="sup1">7.920</div>
                <div class="s">Support kuat berikutnya: <span id="sup2">7.780</span></div>
              </div>
              <div class="metric">
                <div class="t">Resistance Terdekat</div>
                <div class="n" id="res1">8.150</div>
                <div class="s">Resistance berikutnya: <span id="res2">8.320</span></div>
              </div>
              <div class="metric">
                <div class="t">Pivot (Estimasi)</div>
                <div class="n" id="pivot">8.040</div>
                <div class="s">Bias: <span class="pos" id="bias">Bullish ringan</span></div>
              </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px">
              <div>
                <div class="lvl support"><div><span class="name">Support 1</span><span class="tag">S1</span></div><div class="price" id="lvlS1">7.920</div></div>
                <div class="lvl support"><div><span class="name">Support 2</span><span class="tag">S2</span></div><div class="price" id="lvlS2">7.780</div></div>
                <div class="lvl support"><div><span class="name">Support 3</span><span class="tag">S3</span></div><div class="price" id="lvlS3">7.620</div></div>
              </div>
              <div>
                <div class="lvl resist"><div><span class="name">Resistance 1</span><span class="tag">R1</span></div><div class="price" id="lvlR1">8.150</div></div>
                <div class="lvl resist"><div><span class="name">Resistance 2</span><span class="tag">R2</span></div><div class="price" id="lvlR2">8.320</div></div>
                <div class="lvl resist"><div><span class="name">Resistance 3</span><span class="tag">R3</span></div><div class="price" id="lvlR3">8.520</div></div>
              </div>
            </div>

            <div class="line"></div>

            <div class="muted">
              Konfirmasi indikator menilai “apakah kondisi mendukung entry”.
              Ini <b>decision support</b>, bukan jaminan profit.
            </div>

            <div class="checklist" id="checks">
              <div class="check">
                <div>MA20 vs MA50 <strong id="maTxt">Bullish</strong></div>
                <div class="status ok" id="maSt">OK</div>
              </div>
              <div class="check">
                <div>RSI <strong id="rsiTxt">58,4 (Netral)</strong></div>
                <div class="status mid" id="rsiSt">Cukup</div>
              </div>
              <div class="check">
                <div>MACD <strong id="macdTxt">Histogram +</strong></div>
                <div class="status ok" id="macdSt">OK</div>
              </div>
              <div class="check">
                <div>Volume <strong id="volTxt">Di atas rata-rata</strong></div>
                <div class="status ok" id="volSt">OK</div>
              </div>
              <div class="check">
                <div>Breakout / Rejection <strong id="brTxt">Belum terkonfirmasi</strong></div>
                <div class="status mid" id="brSt">Wait</div>
              </div>
            </div>
          </div>

          <!-- Right: Signal & risk -->
          <div class="box">
            <h3>Rencana Entry & Manajemen Risiko</h3>

            <div class="signal">
              <div class="pill2">
                <span class="dot wait" id="sigDot"></span>
                <span><b>Sinyal:</b> <span id="sigMain">Wait / Confirm</span></span>
              </div>

              <div class="row2">
                <div class="kv">
                  <div class="k2">Entry (Area)</div>
                  <div class="v2" id="entry">7.980 – 8.030</div>
                </div>
                <div class="kv">
                  <div class="k2">Stop Loss (SL)</div>
                  <div class="v2" id="sl">7.900</div>
                </div>
              </div>

              <div class="row2">
                <div class="kv">
                  <div class="k2">Take Profit 1 (TP1)</div>
                  <div class="v2" id="tp1">8.150</div>
                </div>
                <div class="kv">
                  <div class="k2">Take Profit 2 (TP2)</div>
                  <div class="v2" id="tp2">8.320</div>
                </div>
              </div>

              <div class="row2">
                <div class="kv">
                  <div class="k2">Risk/Reward (estimasi)</div>
                  <div class="v2" id="rr">1 : 1,8</div>
                </div>
                <div class="kv">
                  <div class="k2">Saran Lot (demo)</div>
                  <div class="v2" id="lot">2 – 4 lot</div>
                </div>
              </div>

              <div class="line"></div>

              <div class="muted">
                <b>Catatan:</b> Angka-angka ini seharusnya dihitung dari engine (ATR, support/resistance, profil risiko).
                Di UI ini ditampilkan sebagai contoh output.
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    // Simple UI logic (demo)
    const confBar = document.getElementById('confBar');
    const confVal = document.getElementById('conf');
    const runBtn = document.getElementById('runBtn');
    const tickerLabel = document.getElementById('tickerLabel');
    const kode = document.getElementById('kode');
    const plan = document.getElementById('plan');
    const chips = (root) => Array.from(root.querySelectorAll('.chip'));

    function setConfidence(n){
      const v = Math.max(0, Math.min(100, n));
      confVal.textContent = v;
      confBar.style.width = v + '%';
    }
    setConfidence(64);

    // Timeframe buttons (visual)
    document.getElementById('tfButtons').addEventListener('click', (e)=>{
      if(e.target.tagName !== 'BUTTON') return;
      document.querySelectorAll('#tfButtons button').forEach(b=>b.classList.remove('active'));
      e.target.classList.add('active');
    });

    // Toggle chips active
    function wireChips(root, multi=false){
      root.addEventListener('click', (e)=>{
        const el = e.target.closest('.chip');
        if(!el) return;
        if(!multi){
          chips(root).forEach(c=>c.classList.remove('active'));
          el.classList.add('active');
        }else{
          el.classList.toggle('active');
        }
      });
    }
    wireChips(document.getElementById('tfSupport'), true);
    wireChips(plan, false);

    // "Apply analysis" demo: vary outputs based on plan
    runBtn.addEventListener('click', ()=>{
      const t = (kode.value || 'BBCA').trim().toUpperCase();
      tickerLabel.textContent = t;

      const activePlan = plan.querySelector('.chip.active')?.dataset.v || 'premium';

      // Defaults (dummy)
      const outputs = {
        free: {
          signal: 'Wait / Learn',
          dot: 'wait',
          conf: 45,
          rsi: '52,1',
          macd: 'Netral',
          lot: '—',
          note: 'Paket Free menampilkan edukasi & contoh sederhana.'
        },
        premium: {
          signal: 'Wait / Confirm',
          dot: 'wait',
          conf: 64,
          rsi: '58,4',
          macd: 'Histogram +',
          lot: '2 – 4 lot',
          note: 'Premium: 1 indikator pilihan + output risiko dasar.'
        },
        pro: {
          signal: 'Buy on Confirm',
          dot: 'buy',
          conf: 78,
          rsi: '61,8',
          macd: 'Bullish',
          lot: '4 – 6 lot',
          note: 'Pro: multi indikator + kontrol & insight lebih dalam.'
        }
      };

      const o = outputs[activePlan];

      document.getElementById('signalTxt').textContent = o.signal;
      document.getElementById('sigMain').textContent = o.signal;
      document.getElementById('rsi').textContent = o.rsi;
      document.getElementById('macdTxt').textContent = o.macd;
      document.getElementById('lot').textContent = o.lot;

      // Dot color
      const map = {buy:'buy', wait:'wait', sell:'sell'};
      const dotClass = map[o.dot] || 'wait';
      document.getElementById('sigDot').className = 'dot ' + dotClass;

      // Confidence bar
      setConfidence(o.conf);

      // Update checklist statuses slightly
      const maSt = document.getElementById('maSt');
      const rsiSt = document.getElementById('rsiSt');
      const macdSt = document.getElementById('macdSt');
      const brSt = document.getElementById('brSt');

      if(activePlan === 'free'){
        maSt.className = 'status mid'; maSt.textContent='Cukup';
        rsiSt.className='status mid'; rsiSt.textContent='Cukup';
        macdSt.className='status mid'; macdSt.textContent='Cukup';
        brSt.className='status mid'; brSt.textContent='Wait';
      } else if(activePlan === 'premium'){
        maSt.className='status ok'; maSt.textContent='OK';
        rsiSt.className='status mid'; rsiSt.textContent='Cukup';
        macdSt.className='status ok'; macdSt.textContent='OK';
        brSt.className='status mid'; brSt.textContent='Wait';
      } else {
        maSt.className='status ok'; maSt.textContent='OK';
        rsiSt.className='status ok'; rsiSt.textContent='OK';
        macdSt.className='status ok'; macdSt.textContent='OK';
        brSt.className='status ok'; brSt.textContent='OK';
        document.getElementById('brTxt').textContent = 'Breakout terkonfirmasi';
        document.getElementById('rsiTxt').textContent = '61,8 (Bullish ringan)';
      }

      alert(`Analisis diterapkan (demo)\nTicker: ${t}\nPlan: ${activePlan.toUpperCase()}\nCatatan: ${o.note}`);
    });

    // Theme toggle (demo label only)
    const themeBtn = document.getElementById('themeBtn');
    let isDark = true;
    themeBtn.addEventListener('click', ()=>{
      isDark = !isDark;
      themeBtn.innerHTML = isDark
        ? '<span>🌙</span> <span><strong>Mode</strong> Gelap</span>'
        : '<span>☀️</span> <span><strong>Mode</strong> Terang</span>';
      // UI tetap dark agar konsisten; kamu bisa implement CSS variables swap kalau mau.
    });
  </script>
</body>
</html>