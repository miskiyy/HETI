<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Nova Capital — Bandar & Order Book</title>
  <style>
    :root{
      --bg0:#050a16; --bg1:#071027;
      --text:#eaf1ff; --muted:#9fb2d6; --muted2:#7f93bc;
      --panel: rgba(255,255,255,.06);
      --panel2: rgba(0,0,0,.22);
      --stroke: rgba(255,255,255,.10);
      --stroke2: rgba(255,255,255,.08);
      --green:#20d37a; --green2:#16b864;
      --red:#ff4d6d; --yellow:#ffd166; --blue:#4ea1ff;
      --shadow: 0 18px 60px rgba(0,0,0,.45);
      --radius: 18px; --radius2: 14px;
      --font: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial;
    }
    *{box-sizing:border-box}
    body{
      margin:0; font-family:var(--font); color:var(--text); min-height:100vh;
      background:
        radial-gradient(900px 600px at 22% 18%, #0f2d6d35 0%, transparent 55%),
        radial-gradient(900px 600px at 80% 20%, #0f7a5a25 0%, transparent 55%),
        radial-gradient(1200px 800px at 60% 85%, #2b3fff18 0%, transparent 60%),
        linear-gradient(180deg, var(--bg0), var(--bg1));
    }
    .wrap{max-width:1320px;margin:0 auto;padding:22px 18px 44px}
    .top{
      display:flex; align-items:center; justify-content:space-between; gap:14px;
      padding: 10px 6px 18px;
    }
    .brand{display:flex;align-items:center;gap:12px}
    .logo{
      width:42px;height:42px;border-radius:12px;
      background: linear-gradient(135deg, #0f4cff, #19d38a);
      display:grid;place-items:center; box-shadow: 0 10px 30px rgba(0,0,0,.35);
    }
    .brand h1{margin:0;font-size:18px}
    .brand p{margin:2px 0 0;color:var(--muted);font-size:12.5px}
    .actions{display:flex;gap:10px;flex-wrap:wrap}
    .pill{
      display:flex;align-items:center;gap:8px;
      padding:10px 12px;border-radius:999px;
      background: rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.08);
      color:var(--muted);font-size:13px;
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0,0,0,.25);
      user-select:none;
    }
    .pill .dot{width:8px;height:8px;border-radius:50%;background:var(--green);box-shadow:0 0 0 6px rgba(32,211,122,.12)}
    .btn{
      padding:10px 14px;border-radius:999px;
      background: rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.10);
      color:var(--text);font-weight:700;cursor:pointer;
      box-shadow: 0 10px 30px rgba(0,0,0,.25);
    }

    .grid{display:grid;grid-template-columns: 420px 1fr;gap:18px;align-items:start}
    @media (max-width:1100px){.grid{grid-template-columns:1fr}}

    .panel{
      border-radius: var(--radius);
      background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
      border: 1px solid rgba(255,255,255,.08);
      box-shadow: var(--shadow);
      backdrop-filter: blur(12px);
      overflow:hidden;
    }
    .hd{
      padding: 16px 18px;
      border-bottom: 1px solid rgba(255,255,255,.07);
      display:flex; align-items:center; justify-content:space-between; gap:10px;
    }
    .hd h2{margin:0;font-size:14px}
    .hd span{font-size:12px;color:var(--muted)}
    .bd{padding:18px}

    label{display:block;font-size:12px;color:var(--muted);margin-bottom:6px}
    .field{
      width:100%;
      padding:10px 12px;border-radius:14px;
      background: rgba(0,0,0,.20);
      border:1px solid rgba(255,255,255,.08);
      color:var(--text); outline:none;
    }
    .row{display:grid;grid-template-columns: 1fr 1fr;gap:12px}
    @media (max-width:520px){.row{grid-template-columns:1fr}}
    .primary{
      width:100%; margin-top:10px;
      padding:13px 14px;border-radius:999px;
      background: linear-gradient(180deg, var(--green), var(--green2));
      border:none;color:#062015;font-weight:900;cursor:pointer;
      box-shadow: 0 14px 40px rgba(32,211,122,.25);
    }
    .help{font-size:12px;color:var(--muted2);line-height:1.45}
    .line{height:1px;background:rgba(255,255,255,.07);margin:12px 0}

    /* Key stats block */
    .tabs{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:12px}
    .tab{
      padding:8px 10px;border-radius:999px;font-size:12px;cursor:pointer;
      background: rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.10);
      color:var(--muted);
    }
    .tab.active{
      color:var(--text);
      border-color: rgba(32,211,122,.35);
      background: rgba(32,211,122,.14);
      font-weight:800;
    }

    .kstats{
      display:grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap:12px;
    }
    @media (max-width:700px){.kstats{grid-template-columns:1fr 1fr}}
    @media (max-width:420px){.kstats{grid-template-columns:1fr}}
    .kcard{
      background: rgba(0,0,0,.22);
      border:1px solid rgba(255,255,255,.08);
      border-radius: 16px;
      padding: 12px;
      min-height: 84px;
    }
    .kcard .k{font-size:12px;color:var(--muted);margin-bottom:6px}
    .kcard .v{font-size:18px;font-weight:900}
    .pos{color:var(--green)} .neg{color:var(--red)} .warn{color:var(--yellow)}

    /* Orderbook */
    .orderWrap{padding:0 16px 16px}
    .order{
      background: rgba(0,0,0,.22);
      border:1px solid rgba(255,255,255,.08);
      border-radius: 18px;
      padding: 12px;
    }
    .orderTop{
      display:flex;align-items:center;justify-content:space-between;gap:10px;flex-wrap:wrap;
      margin-bottom:10px;
    }
    .ticker{
      font-weight:900; letter-spacing:.6px; font-size:16px;
      padding:8px 10px;border-radius:999px;
      background: rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.10);
    }
    .meta{font-size:12px;color:var(--muted)}
    .obTable{
      width:100%;
      border-collapse:separate;
      border-spacing:0;
      overflow:hidden;
      border-radius: 16px;
      border:1px solid rgba(255,255,255,.08);
    }
    .obTable thead th{
      background: rgba(255,255,255,.06);
      color: var(--muted);
      font-size:12px;
      text-align:center;
      padding:10px 8px;
      border-bottom:1px solid rgba(255,255,255,.08);
    }
    .obTable tbody td{
      font-size:13px;
      padding:12px 8px;
      text-align:center;
      border-bottom:1px solid rgba(255,255,255,.06);
      background: rgba(0,0,0,.10);
      position:relative;
    }
    .obTable tbody tr:last-child td{border-bottom:none}
    .obTable td.bidP{color: var(--red); font-weight:900}
    .obTable td.askP{color: var(--green); font-weight:900}
    .obTable td.freq{color: #a9b7ff; font-weight:700}
    .obTable tfoot td{
      background: rgba(255,255,255,.06);
      padding:12px 8px;
      font-weight:900;
      border-top:1px solid rgba(255,255,255,.08);
      text-align:center;
    }
    /* depth mini bars in cells */
    .depth{
      position:absolute; top:50%; transform: translateY(-50%);
      height:6px;border-radius:999px; opacity:.9;
    }
    .depth.bid{left:10px; background: rgba(255,77,109,.55)}
    .depth.ask{right:10px; background: rgba(32,211,122,.45)}
    .small{font-size:11px;color:var(--muted2)}
    .twoCols{
      display:grid;grid-template-columns: 1fr 1fr;gap:12px;padding:0 16px 16px;
    }
    @media (max-width:900px){.twoCols{grid-template-columns:1fr}}
    .box{
      background: rgba(0,0,0,.22);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 16px;
      padding: 14px;
    }
    .box h3{margin:0 0 10px;font-size:13px}
    .grid4{display:grid;grid-template-columns: repeat(4,1fr);gap:10px}
    @media (max-width:1100px){.grid4{grid-template-columns: repeat(2,1fr)}}
    @media (max-width:520px){.grid4{grid-template-columns:1fr}}
    .metric{
      background: rgba(255,255,255,.05);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 14px;
      padding: 10px;
      min-height: 74px;
    }
    .metric .t{font-size:12px;color:var(--muted);margin-bottom:6px}
    .metric .n{font-size:16px;font-weight:900}
    .metric .s{font-size:12px;color:var(--muted2);margin-top:4px}
    .pill2{
      display:inline-flex;align-items:center;gap:8px;
      padding:8px 10px;border-radius:999px;
      border:1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      font-size:12px;color:var(--muted);
    }
    .pill2 .dot{width:8px;height:8px;border-radius:50%}
    .dot.good{background:var(--green)}
    .dot.mid{background:var(--yellow)}
    .dot.bad{background:var(--red)}

    /* tape */
    .tape{
      width:100%;
      border-collapse:separate;border-spacing:0 8px;
    }
    .tape td{
      padding:10px 10px;
      background: rgba(255,255,255,.04);
      border: 1px solid rgba(255,255,255,.08);
      font-size:12px;color:var(--muted);
    }
    .tape td:first-child{border-radius:12px 0 0 12px}
    .tape td:last-child{border-radius:0 12px 12px 0;text-align:right;font-weight:900;color:var(--text)}
    .tape .buy{color:var(--green);font-weight:900}
    .tape .sell{color:var(--red);font-weight:900}

    /* alerts */
    .check{
      display:flex;align-items:center;justify-content:space-between;gap:10px;
      padding:10px;border-radius:14px;
      background: rgba(255,255,255,.04);
      border: 1px solid rgba(255,255,255,.08);
      font-size:12px;color:var(--muted);
      margin-bottom:8px;
    }
    .check:last-child{margin-bottom:0}
    .status{
      font-size:11px;padding:4px 8px;border-radius:999px;
      border:1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      color: var(--muted);
      white-space:nowrap;
    }
    .status.on{border-color: rgba(32,211,122,.35); background: rgba(32,211,122,.14); color: var(--text)}
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
        <p>Bandar (Smart Money) — order book, imbalance, dan indikasi akumulasi/distribusi</p>
      </div>
    </div>
    <div class="actions">
      <div class="pill"><span class="dot"></span><span><b>Order Book</b> Aktif</span></div>
      <button class="btn" type="button" onclick="alert('Navigasi: kembali (dummy)')">← Kembali</button>
    </div>
  </div>

  <div class="grid">
    <!-- LEFT: Settings -->
    <div class="panel">
      <div class="hd">
        <h2>Pengaturan Bandar</h2>
        <span>Input & filter</span>
      </div>
      <div class="bd">
        <label>Kode Saham</label>
        <input id="ticker" class="field" value="BBCA" placeholder="Contoh: BBCA"/>

        <div class="row" style="margin-top:12px">
          <div>
            <label>Timeframe</label>
            <select id="tf" class="field">
              <option selected>Intraday (Live)</option>
              <option>1D Snapshot</option>
            </select>
          </div>
          <div>
            <label>Depth Level</label>
            <select id="depth" class="field">
              <option>5 level</option>
              <option selected>10 level</option>
              <option>20 level</option>
            </select>
          </div>
        </div>

        <div class="row" style="margin-top:12px">
          <div>
            <label>Filter Lot Minimum</label>
            <input id="minLot" class="field" value="5000" />
          </div>
          <div>
            <label>Mode Deteksi</label>
            <select id="mode" class="field">
              <option selected>Akumulasi/Distribusi</option>
              <option>Wall Detection</option>
              <option>Spoof Risk</option>
            </select>
          </div>
        </div>

        <button class="primary" id="apply">Terapkan Analisis</button>
        <div class="help">
          Output di bawah adalah contoh UI. Untuk produksi, sambungkan ke data order book real-time + time&sales.
        </div>

        <div class="line"></div>

        <div class="help">
          <b>Definisi singkat:</b><br/>
          • <b>Bid Wall</b>: antrian beli besar pada level bid tertentu.<br/>
          • <b>Ask Wall</b>: antrian jual besar pada level ask tertentu.<br/>
          • <b>Imbalance</b>: perbandingan total lot bid vs ask di beberapa level.<br/>
          • <b>Absorption</b>: tekanan jual besar tapi harga tidak turun banyak (indikasi diserap).
        </div>
      </div>
    </div>

    <!-- RIGHT: Main -->
    <div class="panel">
      <div class="hd">
        <h2>Order Book & Bandar Insights</h2>
        <span>Key Stats • Bid/Ask • Tape • Alert</span>
      </div>

      <div class="bd">
        <div class="tabs" id="tabs">
          <div class="tab active">ORDERBOOK</div>
          <div class="tab">KEYSTATS</div>
          <div class="tab">ANALISIS</div>
        </div>

        <!-- Key Stats (like your screenshot) -->
        <div class="kstats" style="margin-bottom:14px">
          <div class="kcard">
            <div class="k">Open</div><div class="v" id="open">8.025</div>
          </div>
          <div class="kcard">
            <div class="k">Prev</div><div class="v" id="prev">8.025</div>
          </div>
          <div class="kcard">
            <div class="k">Lot</div><div class="v neg" id="lotTotal">322.57K</div>
          </div>
          <div class="kcard">
            <div class="k">High</div><div class="v" id="high">8.025</div>
          </div>
          <div class="kcard">
            <div class="k">ARA</div><div class="v" id="ara">9.625</div>
          </div>
          <div class="kcard">
            <div class="k">Val</div><div class="v neg" id="val">257.57B</div>
          </div>
          <div class="kcard">
            <div class="k">Low</div><div class="v neg" id="low">7.950</div>
          </div>
          <div class="kcard">
            <div class="k">ARB</div><div class="v" id="arb">6.825</div>
          </div>
          <div class="kcard">
            <div class="k">Avg</div><div class="v neg" id="avg">7.985</div>
          </div>
        </div>
      </div>

      <!-- Order Book -->
      <div class="orderWrap">
        <div class="order">
          <div class="orderTop">
            <div>
              <span class="ticker" id="tkLabel">BBCA</span>
              <span class="meta">• 10 level • Spread: <b id="spread">25</b> • Mid: <b id="mid">8.012</b></span>
            </div>
            <div class="meta">Update: <span id="time">12:41:08</span></div>
          </div>

          <table class="obTable" id="ob">
            <thead>
            <tr>
              <th>Freq</th><th>Lot</th><th>Bid</th>
              <th>Ask</th><th>Lot</th><th>Freq</th>
            </tr>
            </thead>
            <tbody></tbody>
            <tfoot>
            <tr>
              <td id="tBidFreq">15.075</td>
              <td id="tBidLot">329.542</td>
              <td></td>
              <td></td>
              <td id="tAskLot">204.057</td>
              <td id="tAskFreq">2.613</td>
            </tr>
            </tfoot>
          </table>

          <div class="help" style="margin-top:10px">
            *Order book menampilkan kedalaman bid/ask. Bar kecil menunjukkan besar lot relatif per level.
          </div>
        </div>
      </div>

      <!-- Insights + Tape -->
      <div class="twoCols">
        <div class="box">
          <h3>Bandar Insights (Ringkas)</h3>
          <div class="grid4">
            <div class="metric">
              <div class="t">Imbalance (Bid vs Ask)</div>
              <div class="n" id="imb">+38%</div>
              <div class="s">tekanan beli lebih kuat</div>
            </div>
            <div class="metric">
              <div class="t">Bid Wall (terbesar)</div>
              <div class="n" id="bidWall">7.950</div>
              <div class="s">90.121 lot</div>
            </div>
            <div class="metric">
              <div class="t">Ask Wall (terbesar)</div>
              <div class="n" id="askWall">8.000</div>
              <div class="s">54.121 lot</div>
            </div>
            <div class="metric">
              <div class="t">Spoof Risk</div>
              <div class="n warn" id="spoof">Sedang</div>
              <div class="s">order besar rawan hilang</div>
            </div>
          </div>

          <div class="line"></div>

          <div class="pill2" style="margin-bottom:10px">
            <span class="dot mid" id="sigDot"></span>
            <span><b>Indikasi:</b> <span id="sigTxt">Akumulasi ringan (butuh konfirmasi)</span></span>
          </div>

          <div class="help">
            <b>Interpretasi cepat:</b><br/>
            • Imbalance positif + bid wall dekat harga bisa mendukung <b>support</b>.<br/>
            • Ask wall dekat harga bisa jadi <b>hambatan</b> / supply besar.<br/>
            • Absorption terlihat jika sell besar tetapi harga tahan di area support.<br/>
            • Tetap konfirmasi dengan teknikal (trend/momentum).
          </div>
        </div>

        <div class="box">
          <h3>Time & Sales (Tape) — Dummy</h3>
          <table class="tape">
            <tr><td>12:40:58</td><td><span class="buy">BUY</span> 8.025</td><td>2.100 lot</td><td>Broker: <b>YP</b></td></tr>
            <tr><td>12:40:51</td><td><span class="sell">SELL</span> 8.000</td><td>1.350 lot</td><td>Broker: <b>CC</b></td></tr>
            <tr><td>12:40:44</td><td><span class="buy">BUY</span> 8.025</td><td>3.600 lot</td><td>Broker: <b>PD</b></td></tr>
            <tr><td>12:40:31</td><td><span class="sell">SELL</span> 8.000</td><td>900 lot</td><td>Broker: <b>AK</b></td></tr>
            <tr><td>12:40:22</td><td><span class="buy">BUY</span> 8.025</td><td>1.200 lot</td><td>Broker: <b>XC</b></td></tr>
          </table>

          <div class="line"></div>

          <h3>Alert Rules (Demo)</h3>
          <div class="check">
            <div>Bid Wall muncul ≤ 2 tick dari harga</div>
            <div class="status on">ON</div>
          </div>
          <div class="check">
            <div>Ask Wall muncul tepat di resistance</div>
            <div class="status on">ON</div>
          </div>
          <div class="check">
            <div>Imbalance berubah > 20% dalam 1 menit</div>
            <div class="status">OFF</div>
          </div>

          <div class="help" style="margin-top:8px">
            Alert ini bisa kamu sambungkan ke notifikasi (web push / app notif).
          </div>
        </div>
      </div>

      <div class="help" style="text-align:center;padding:0 16px 16px">
        *Demo UI — bukan rekomendasi investasi. Data contoh untuk kebutuhan desain.
      </div>
    </div>
  </div>
</div>

<script>
  // ===== Dummy order book data (mirip screenshot) =====
  const data = [
    {bf:714,  blot:51876, bid:7975, ask:8000,  alot:54121, af:540},
    {bf:5896, blot:90121, bid:7950, ask:8025,  alot:22400, af:387},
    {bf:1782, blot:32963, bid:7925, ask:8050,  alot:13986, af:262},
    {bf:3423, blot:70778, bid:7900, ask:8075,  alot:25224, af:146},
    {bf:547,  blot:12965, bid:7875, ask:8100,  alot:20473, af:317},
    {bf:738,  blot:16444, bid:7850, ask:8125,  alot:13419, af:132},
    {bf:331,  blot:8828,  bid:7825, ask:8150,  alot:16227, af:172},
    {bf:1234, blot:35522, bid:7800, ask:8175,  alot:9260,  af:166},
    {bf:184,  blot:3987,  bid:7775, ask:8200,  alot:22770, af:366},
    {bf:226,  blot:6058,  bid:7750, ask:8225,  alot:6177,  af:125},
  ];

  const tbody = document.querySelector("#ob tbody");

  function fmt(n){
    // thousands separator (ID style)
    return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }

  function renderOrderbook(){
    tbody.innerHTML = "";
    const maxBidLot = Math.max(...data.map(r => r.blot));
    const maxAskLot = Math.max(...data.map(r => r.alot));

    data.forEach(r=>{
      const tr = document.createElement("tr");

      const tdBF = document.createElement("td");
      tdBF.className="freq";
      tdBF.textContent = fmt(r.bf);

      const tdBL = document.createElement("td");
      tdBL.textContent = fmt(r.blot);
      // depth bar bid
      const bbar = document.createElement("div");
      bbar.className="depth bid";
      bbar.style.width = (6 + (r.blot/maxBidLot)*70) + "%";
      tdBL.appendChild(bbar);

      const tdB = document.createElement("td");
      tdB.className="bidP";
      tdB.textContent = fmt(r.bid);

      const tdA = document.createElement("td");
      tdA.className="askP";
      tdA.textContent = fmt(r.ask);

      const tdAL = document.createElement("td");
      tdAL.textContent = fmt(r.alot);
      // depth bar ask
      const abar = document.createElement("div");
      abar.className="depth ask";
      abar.style.width = (6 + (r.alot/maxAskLot)*70) + "%";
      tdAL.appendChild(abar);

      const tdAF = document.createElement("td");
      tdAF.className="freq";
      tdAF.textContent = fmt(r.af);

      tr.append(tdBF, tdBL, tdB, tdA, tdAL, tdAF);
      tbody.appendChild(tr);
    });

    // spread + mid from top level
    const bestBid = data[0].bid;
    const bestAsk = data[0].ask;
    const spread = bestAsk - bestBid;
    const mid = Math.round((bestAsk + bestBid)/2);

    document.getElementById("spread").textContent = spread;
    document.getElementById("mid").textContent = fmt(mid);
  }

  function computeInsights(){
    // simple metrics
    const sumBid = data.reduce((a,r)=>a+r.blot,0);
    const sumAsk = data.reduce((a,r)=>a+r.alot,0);
    const imb = ((sumBid - sumAsk) / Math.max(1, sumAsk)) * 100;

    // find walls
    const bidWallRow = data.reduce((best,r)=> r.blot>best.blot ? r : best, data[0]);
    const askWallRow = data.reduce((best,r)=> r.alot>best.alot ? r : best, data[0]);

    document.getElementById("imb").textContent = (imb>=0?"+":"") + imb.toFixed(0) + "%";
    document.getElementById("bidWall").textContent = fmt(bidWallRow.bid);
    document.getElementById("askWall").textContent = fmt(askWallRow.ask);

    // spoof risk heuristic: if 1 wall dominates too much -> medium/high
    const bidDom = bidWallRow.blot / sumBid;
    const askDom = askWallRow.alot / sumAsk;
    let risk="Rendah", dot="good", sig="Netral (butuh konfirmasi)";

    if(bidDom>0.30 || askDom>0.30){ risk="Sedang"; dot="mid"; }
    if(bidDom>0.42 || askDom>0.42){ risk="Tinggi"; dot="bad"; }

    // signal heuristic
    if(imb > 20 && bidWallRow.bid >= data[1].bid) sig = "Akumulasi ringan (butuh konfirmasi)";
    if(imb > 45) sig = "Akumulasi kuat (lebih mendukung buy)";
    if(imb < -20) sig = "Distribusi (tekanan jual dominan)";

    document.getElementById("spoof").textContent = risk;
    document.getElementById("sigTxt").textContent = sig;

    const sigDot = document.getElementById("sigDot");
    sigDot.className = "dot " + dot;
  }

  function tickTime(){
    const d = new Date();
    const hh = String(d.getHours()).padStart(2,"0");
    const mm = String(d.getMinutes()).padStart(2,"0");
    const ss = String(d.getSeconds()).padStart(2,"0");
    document.getElementById("time").textContent = `${hh}:${mm}:${ss}`;
  }

  // Apply button: set ticker label etc (demo)
  document.getElementById("apply").addEventListener("click", ()=>{
    const t = (document.getElementById("ticker").value || "BBCA").trim().toUpperCase();
    document.getElementById("tkLabel").textContent = t;
    renderOrderbook();
    computeInsights();
    alert(`Analisis Bandar diterapkan (demo)\nTicker: ${t}\nCatatan: angka contoh untuk UI.`);
  });

  // initial
  renderOrderbook();
  computeInsights();
  tickTime();
  setInterval(tickTime, 1000);
</script>
</body>
</html>
