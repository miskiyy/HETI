<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Nova Capital — Money Management</title>
  <style>
    :root{
      --bg0:#050a16; --bg1:#071027;
      --text:#eaf1ff; --muted:#9fb2d6; --muted2:#7f93bc;
      --green:#20d37a; --green2:#16b864; --red:#ff4d6d; --yellow:#ffd166; --blue:#4ea1ff;
      --shadow:0 18px 60px rgba(0,0,0,.45);
      --radius:18px; --font: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
    }
    *{box-sizing:border-box}
    body{
      margin:0; font-family:var(--font); color:var(--text); min-height:100vh;
      background:
        radial-gradient(900px 600px at 22% 18%, #0f2d6d35 0%, transparent 55%),
        radial-gradient(900px 600px at 80% 20%, #0f7a5a25 0%, transparent 55%),
        linear-gradient(180deg, var(--bg0), var(--bg1));
    }
    .wrap{max-width:1180px;margin:0 auto;padding:22px 18px 44px}
    .top{display:flex;justify-content:space-between;align-items:center;gap:14px;padding:10px 6px 18px;flex-wrap:wrap}
    .brand{display:flex;align-items:center;gap:12px}
    .logo{width:42px;height:42px;border-radius:12px;background:linear-gradient(135deg,#0f4cff,#19d38a);display:grid;place-items:center;box-shadow:0 10px 30px rgba(0,0,0,.35)}
    .brand h1{margin:0;font-size:18px}
    .brand p{margin:2px 0 0;color:var(--muted);font-size:12.5px}
    .pill{display:inline-flex;align-items:center;gap:8px;padding:10px 12px;border-radius:999px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.10);color:var(--muted);font-size:13px}
    .pill .dot{width:8px;height:8px;border-radius:50%;background:var(--green);box-shadow:0 0 0 6px rgba(32,211,122,.12)}
    .grid{display:grid;grid-template-columns:420px 1fr;gap:18px;align-items:start}
    @media (max-width:1000px){.grid{grid-template-columns:1fr}}
    .panel{
      border-radius:var(--radius);
      background:linear-gradient(180deg,rgba(255,255,255,.06),rgba(255,255,255,.03));
      border:1px solid rgba(255,255,255,.08);
      box-shadow:var(--shadow);
      backdrop-filter: blur(12px);
      overflow:hidden;
    }
    .hd{padding:16px 18px;border-bottom:1px solid rgba(255,255,255,.07);display:flex;justify-content:space-between;align-items:center;gap:10px}
    .hd h2{margin:0;font-size:14px}
    .hd span{font-size:12px;color:var(--muted)}
    .bd{padding:18px}
    label{display:block;font-size:12px;color:var(--muted);margin-bottom:6px}
    .field{
      width:100%;padding:10px 12px;border-radius:14px;
      background:rgba(0,0,0,.20);border:1px solid rgba(255,255,255,.08);
      color:var(--text);outline:none;
    }
    .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
    @media (max-width:520px){.row{grid-template-columns:1fr}}
    .primary{
      width:100%;margin-top:10px;padding:13px 14px;border-radius:999px;
      background:linear-gradient(180deg,var(--green),var(--green2));
      border:none;color:#062015;font-weight:900;cursor:pointer;
      box-shadow:0 14px 40px rgba(32,211,122,.25);
    }
    .help{font-size:12px;color:var(--muted2);line-height:1.45}
    .line{height:1px;background:rgba(255,255,255,.07);margin:12px 0}
    .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;padding:16px}
    @media (max-width:900px){.cards{grid-template-columns:repeat(2,1fr)}}
    @media (max-width:520px){.cards{grid-template-columns:1fr}}
    .card{background:rgba(0,0,0,.22);border:1px solid rgba(255,255,255,.08);border-radius:16px;padding:14px;min-height:92px}
    .k{font-size:12px;color:var(--muted);margin-bottom:8px}
    .v{font-size:18px;font-weight:900}
    .pos{color:var(--green)} .neg{color:var(--red)} .warn{color:var(--yellow)}
    .box{background:rgba(0,0,0,.22);border:1px solid rgba(255,255,255,.08);border-radius:16px;padding:14px;margin:0 16px 16px}
    .box h3{margin:0 0 10px;font-size:13px}
    .rec{
      display:grid;gap:10px;
      background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);
      border-radius:14px;padding:12px;
    }
    .recRow{display:flex;justify-content:space-between;gap:10px;flex-wrap:wrap}
    .tag{font-size:11px;padding:4px 8px;border-radius:999px;border:1px solid rgba(255,255,255,.10);background:rgba(255,255,255,.06);color:var(--muted)}
    .tag.good{border-color:rgba(32,211,122,.35);background:rgba(32,211,122,.14);color:var(--text)}
    .tag.bad{border-color:rgba(255,77,109,.35);background:rgba(255,77,109,.12);color:var(--text)}
  </style>
</head>
<body>
<div class="wrap">
  <div class="top">
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
        <p>Money Management — hitung lot, risiko, stop loss, target, dan rencana entry</p>
      </div>
    </div>
    <div class="pill"><span class="dot"></span><b>Money Management</b></div>
  </div>

  <div class="grid">
    <!-- LEFT INPUT -->
    <div class="panel">
      <div class="hd"><h2>Input</h2><span>Isi data investor & saham</span></div>
      <div class="bd">
        <label>Dana Tersedia (Rp)</label>
        <input id="capital" class="field" value="10000000" />

        <div class="row" style="margin-top:12px">
          <div>
            <label>Kode Saham</label>
            <input id="ticker" class="field" value="BBCA" />
          </div>
          <div>
            <label>Harga Sekarang</label>
            <input id="price" class="field" value="8025" />
          </div>
        </div>

        <div class="row" style="margin-top:12px">
          <div>
            <label>Support / Area Beli (opsional)</label>
            <input id="support" class="field" value="7950" />
          </div>
          <div>
            <label>Stop Loss (wajib)</label>
            <input id="sl" class="field" value="7800" />
          </div>
        </div>

        <div class="row" style="margin-top:12px">
          <div>
            <label>Target 1 (TP1)</label>
            <input id="tp1" class="field" value="8250" />
          </div>
          <div>
            <label>Target 2 (TP2) (opsional)</label>
            <input id="tp2" class="field" value="8500" />
          </div>
        </div>

        <div class="row" style="margin-top:12px">
          <div>
            <label>Profil Risiko</label>
            <select id="riskProfile" class="field">
              <option>Conservative</option>
              <option selected>Balanced</option>
              <option>Aggressive</option>
            </select>
          </div>
          <div>
            <label>Max Risiko per Transaksi</label>
            <select id="riskPct" class="field">
              <option value="0.005">0,5%</option>
              <option value="0.01" selected>1%</option>
              <option value="0.015">1,5%</option>
              <option value="0.02">2%</option>
            </select>
          </div>
        </div>

        <div class="row" style="margin-top:12px">
          <div>
            <label>Batas Maks Posisi</label>
            <select id="maxPosPct" class="field">
              <option value="0.15">15% dari dana</option>
              <option value="0.25" selected>25% dari dana</option>
              <option value="0.35">35% dari dana</option>
              <option value="0.50">50% dari dana</option>
            </select>
          </div>
          <div>
            <label>Mode Entry</label>
            <select id="entryMode" class="field">
              <option selected>Split Entry (2 tahap)</option>
              <option>Single Entry</option>
              <option>DCA (3 tahap)</option>
            </select>
          </div>
        </div>

        <button class="primary" id="calc">Buat Rekomendasi</button>
        <div class="help">
          Catatan: perhitungan menggunakan <b>risk-based position sizing</b> (maks rugi = risk% × dana).
        </div>
      </div>
    </div>

    <!-- RIGHT OUTPUT -->
    <div class="panel">
      <div class="hd"><h2>Rekomendasi</h2><span>Lot • SL/TP • Risk/Reward</span></div>

      <div class="cards">
        <div class="card">
          <div class="k">Maks Risiko (Rp)</div>
          <div class="v" id="maxRisk">Rp 0</div>
          <div class="k" style="margin-top:10px">Status</div>
          <div class="v" id="riskStatus"><span class="tag">—</span></div>
        </div>
        <div class="card">
          <div class="k">Ukuran Posisi (Rp)</div>
          <div class="v" id="posSize">Rp 0</div>
          <div class="k" style="margin-top:10px">Lot Disarankan</div>
          <div class="v" id="lots">0 lot</div>
        </div>
        <div class="card">
          <div class="k">Risk : Reward (ke TP1)</div>
          <div class="v" id="rr">0.00</div>
          <div class="k" style="margin-top:10px">Saran</div>
          <div class="v" id="action">—</div>
        </div>
      </div>

      <div class="box">
        <h3>Rencana Entry</h3>
        <div class="rec" id="entryPlan"></div>
      </div>

      <div class="box">
        <h3>Detail Risiko</h3>
        <div class="rec" id="riskDetail"></div>
        <div class="help" style="margin-top:10px">
          Nova Capital menyarankan ukuran posisi yang membuat rugi maksimal tetap sesuai batas risiko kamu.
        </div>
      </div>

      <div class="box">
        <h3>Aturan Kelola Posisi (Auto Guidance)</h3>
        <div class="rec" id="rules"></div>
      </div>

      <div class="help" style="text-align:center;padding:0 16px 16px">
        *Bukan rekomendasi investasi. Gunakan bersama analisis teknikal/fundamental.
      </div>
    </div>
  </div>
</div>

<script>
  // IDX: 1 lot = 100 saham
  function rp(n){
    const x = Math.round(n);
    return "Rp " + x.toString().replace(/\B(?=(\d{3})+(?!\d))/g,".");
  }
  function num(v){
    return Number(String(v).replace(/[^\d.-]/g,"")) || 0;
  }

  function build(){
    const capital = num(document.getElementById("capital").value);
    const ticker = (document.getElementById("ticker").value||"").toUpperCase().trim() || "BBCA";
    const price = num(document.getElementById("price").value);
    const support = num(document.getElementById("support").value);
    const sl = num(document.getElementById("sl").value);
    const tp1 = num(document.getElementById("tp1").value);
    const tp2 = num(document.getElementById("tp2").value);
    const riskPct = Number(document.getElementById("riskPct").value);
    const maxPosPct = Number(document.getElementById("maxPosPct").value);
    const entryMode = document.getElementById("entryMode").value;
    const profile = document.getElementById("riskProfile").value;

    // Validation
    if(capital<=0 || price<=0 || sl<=0 || tp1<=0){
      alert("Isi dana, harga, stop loss, dan TP1 dengan benar.");
      return;
    }
    if(sl >= price){
      alert("Stop loss harus di bawah harga entry/harga sekarang.");
      return;
    }

    // Determine entry price baseline
    const entry = (support>0 && support<price) ? support : price; // if support is provided, use it as planned entry
    const riskPerShare = entry - sl;          // Rp risk per saham
    const riskPerLot = riskPerShare * 100;    // Rp risk per lot (100 saham)

    const maxRisk = capital * riskPct;        // max loss allowed
    const lotsByRisk = Math.floor(maxRisk / riskPerLot);

    // Cap by max position value
    const maxPosValue = capital * maxPosPct;
    const lotCost = entry * 100;
    const lotsByPos = Math.floor(maxPosValue / lotCost);

    const lots = Math.max(0, Math.min(lotsByRisk, lotsByPos));
    const posValue = lots * lotCost;

    // Risk/Reward
    const rewardPerShare1 = tp1 - entry;
    const rr1 = rewardPerShare1 / riskPerShare;

    // Make action suggestion
    let action = "WAIT";
    let actionTag = "tag";
    if(lots === 0){
      action = "Tidak disarankan (lot = 0)";
      actionTag = "tag bad";
    } else if(rr1 >= 2){
      action = "Entry layak (R:R bagus)";
      actionTag = "tag good";
    } else if(rr1 >= 1.2){
      action = "Entry boleh (butuh konfirmasi)";
      actionTag = "tag";
    } else {
      action = "Kurang menarik (R:R kecil)";
      actionTag = "tag bad";
    }

    // Profile-based adjustments for entry plan
    let stages = [];
    if(entryMode.includes("Split Entry")){
      stages = [
        {pct:0.60, at: entry},
        {pct:0.40, at: entry - Math.max(25, Math.round((entry-sl)*0.25))} // a bit lower
      ];
    } else if(entryMode.includes("DCA")){
      stages = [
        {pct:0.40, at: entry},
        {pct:0.35, at: entry - Math.max(25, Math.round((entry-sl)*0.20))},
        {pct:0.25, at: entry - Math.max(50, Math.round((entry-sl)*0.35))}
      ];
    } else {
      stages = [{pct:1.0, at: entry}];
    }

    // Conservative tighter position cap / Aggressive allow slightly higher risk text only (still bounded by inputs)
    let profileNote = "";
    if(profile === "Conservative"){
      profileNote = "Fokus: jaga drawdown, entry bertahap, disiplin stop loss.";
    } else if(profile === "Aggressive"){
      profileNote = "Fokus: peluang lebih besar, tapi tetap patuh batas risiko & cut-loss.";
    } else {
      profileNote = "Fokus: seimbang antara peluang dan proteksi risiko.";
    }

    // Risk actual
    const riskIfSL = lots * riskPerLot;
    const rrText = isFinite(rr1) ? rr1.toFixed(2) : "0.00";

    // Populate top cards
    document.getElementById("maxRisk").textContent = rp(maxRisk);
    document.getElementById("posSize").textContent = rp(posValue);
    document.getElementById("lots").textContent = `${lots.toString().replace(/\B(?=(\d{3})+(?!\d))/g,",")} lot`;
    document.getElementById("rr").textContent = rrText;
    document.getElementById("action").innerHTML = `<span class="${actionTag}">${action}</span>`;

    // Risk status
    const riskStatus = document.getElementById("riskStatus");
    let statusTag = "tag";
    let statusTxt = "OK";
    if(riskIfSL > maxRisk*1.001) { statusTag="tag bad"; statusTxt="Over risk"; }
    else if(riskIfSL < maxRisk*0.5) { statusTag="tag"; statusTxt="Conservative sizing"; }
    else { statusTag="tag good"; statusTxt="Within limit"; }
    riskStatus.innerHTML = `<span class="${statusTag}">${statusTxt}</span>`;

    // Entry plan UI
    const entryPlan = document.getElementById("entryPlan");
    entryPlan.innerHTML = "";
    const lotsStr = lots.toString();
    stages.forEach((s, idx)=>{
      const stageLots = Math.floor(lots * s.pct);
      const stageValue = stageLots * s.at * 100;
      const row = document.createElement("div");
      row.className = "recRow";
      row.innerHTML = `
        <div>
          <b>Entry ${idx+1}</b> • ${Math.round(s.pct*100)}% posisi
          <div class="help">Harga: <b>${s.at.toLocaleString("id-ID")}</b> • Lot: <b>${stageLots.toLocaleString("id-ID")}</b></div>
        </div>
        <div>
          <span class="tag">Nilai: ${rp(stageValue)}</span>
        </div>
      `;
      entryPlan.appendChild(row);
    });

    // Risk detail UI
    const riskDetail = document.getElementById("riskDetail");
    const tp2Valid = tp2 > 0 && tp2 > tp1;
    const rewardIfTP1 = lots * (tp1-entry) * 100;
    const rewardIfTP2 = tp2Valid ? lots * (tp2-entry) * 100 : 0;

    riskDetail.innerHTML = `
      <div class="recRow">
        <div><b>${ticker}</b> • Entry plan di <b>${entry.toLocaleString("id-ID")}</b></div>
        <div><span class="tag">Mode: ${profile}</span></div>
      </div>
      <div class="recRow">
        <div>Stop Loss</div>
        <div><b class="neg">${sl.toLocaleString("id-ID")}</b> <span class="tag bad">Max loss: ${rp(riskIfSL)}</span></div>
      </div>
      <div class="recRow">
        <div>TP1</div>
        <div><b class="pos">${tp1.toLocaleString("id-ID")}</b> <span class="tag good">Potensi: ${rp(rewardIfTP1)}</span></div>
      </div>
      <div class="recRow">
        <div>TP2</div>
        <div>${tp2Valid ? `<b class="pos">${tp2.toLocaleString("id-ID")}</b> <span class="tag good">Potensi: ${rp(rewardIfTP2)}</span>` : `<span class="tag">Opsional</span>`}</div>
      </div>
      <div class="recRow">
        <div>Risk per Lot</div>
        <div><b>${rp(riskPerLot)}</b> <span class="tag">(${(riskPerShare).toLocaleString("id-ID")} / share)</span></div>
      </div>
      <div class="recRow">
        <div>Catatan Profil</div>
        <div class="help" style="max-width:520px">${profileNote}</div>
      </div>
    `;

    // Rules UI
    const rules = document.getElementById("rules");
    // trailing suggestion: move SL to BE after TP1 hit
    const be = entry;
    const trail = entry + Math.max(25, Math.round((tp1-entry)*0.4));

    rules.innerHTML = `
      <div class="recRow">
        <div><b>Rule 1 — Disiplin SL</b><div class="help">Jika menyentuh <b>${sl.toLocaleString("id-ID")}</b>, keluar. Jangan geser SL turun.</div></div>
        <div><span class="tag bad">Wajib</span></div>
      </div>
      <div class="recRow">
        <div><b>Rule 2 — Partial TP</b><div class="help">Di TP1 <b>${tp1.toLocaleString("id-ID")}</b>: ambil 30–50% posisi, sisanya follow trend.</div></div>
        <div><span class="tag good">Disarankan</span></div>
      </div>
      <div class="recRow">
        <div><b>Rule 3 — Move SL ke BE</b><div class="help">Setelah TP1 tercapai, naikkan SL ke <b>${be.toLocaleString("id-ID")}</b> (break-even) untuk melindungi modal.</div></div>
        <div><span class="tag">Proteksi</span></div>
      </div>
      <div class="recRow">
        <div><b>Rule 4 — Trailing Stop</b><div class="help">Jika harga lanjut menguat, trailing di sekitar <b>${trail.toLocaleString("id-ID")}</b> atau bawah support terbaru.</div></div>
        <div><span class="tag">Optional</span></div>
      </div>
      <div class="recRow">
        <div><b>Rule 5 — Invalidasi</b><div class="help">Jika breakdown support / volume buruk, batalkan entry tahap berikutnya.</div></div>
        <div><span class="tag">Risk control</span></div>
      </div>
    `;
  }

  document.getElementById("calc").addEventListener("click", build);
  build(); // initial render
</script>
</body>
</html>
