<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Nova Capital — Analisis Fundamental</title>
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
    .wrap{max-width:1320px;margin:0 auto;padding:22px 18px 44px}

    /* top */
    .topbar{display:flex;align-items:center;justify-content:space-between;gap:16px;padding:10px 6px 18px}
    .brand{display:flex;gap:12px;align-items:center}
    .logo{
      width:42px;height:42px;border-radius:12px;
      background: linear-gradient(135deg, #0f4cff, #19d38a);
      display:grid;place-items:center;
      box-shadow: 0 10px 30px rgba(0,0,0,.35);
    }
    .brand h1{font-size:18px;margin:0}
    .brand p{margin:2px 0 0;color:var(--muted);font-size:12.5px}
    .actions{display:flex;align-items:center;gap:10px;flex-wrap:wrap}
    .pill{
      display:flex;align-items:center;gap:8px;
      background: rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.08);
      padding:10px 12px;border-radius:999px;
      backdrop-filter: blur(10px);
      box-shadow: 0 10px 30px rgba(0,0,0,.25);
      color:var(--muted);font-size:13px;cursor:pointer;user-select:none;
    }
    .pill .dot{
      width:8px;height:8px;border-radius:50%;
      background: var(--green);
      box-shadow: 0 0 0 6px rgba(32,211,122,.12);
    }
    .btn{
      background: rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.10);
      padding:10px 14px;border-radius:999px;
      color:var(--text);font-weight:700;cursor:pointer;
      box-shadow: 0 10px 30px rgba(0,0,0,.25);
    }

    /* layout */
    .grid{display:grid;grid-template-columns: 420px 1fr;gap:18px;align-items:start}
    @media (max-width: 1100px){.grid{grid-template-columns:1fr}}

    .panel{
      background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
      border: 1px solid rgba(255,255,255,.08);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
      backdrop-filter: blur(12px);
      overflow:hidden;
    }
    .panel .hd{
      padding: 16px var(--pad);
      border-bottom: 1px solid rgba(255,255,255,.07);
      display:flex;align-items:center;justify-content:space-between;gap:10px;
    }
    .panel .hd h2{font-size:14px;margin:0}
    .panel .hd span{font-size:12px;color:var(--muted)}
    .panel .bd{padding: var(--pad)}

    /* form */
    label{display:block;font-size:12px;color:var(--muted);margin-bottom:6px}
    .field{
      background: rgba(0,0,0,.20);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 14px;
      padding: 10px 12px;
      color: var(--text);
      outline: none;
      width: 100%;
    }
    .row{display:grid;grid-template-columns: 1fr 1fr;gap:12px}
    @media (max-width:520px){.row{grid-template-columns:1fr}}
    .primary{
      width:100%;
      background: linear-gradient(180deg, var(--green), var(--green2));
      border: none;
      color:#062015;
      font-weight:900;
      padding: 13px 14px;
      border-radius: 999px;
      cursor:pointer;
      box-shadow: 0 14px 40px rgba(32,211,122,.25);
      letter-spacing:.2px;
      margin-top: 8px;
    }
    .help{font-size:12px;color:var(--muted2);line-height:1.45}
    .line{height:1px;background: rgba(255,255,255,.07);margin: 12px 0}

    /* cards */
    .cards{display:grid;grid-template-columns: repeat(3, 1fr);gap:12px;padding:16px}
    @media (max-width:1100px){.cards{grid-template-columns:repeat(2,1fr)}}
    @media (max-width:520px){.cards{grid-template-columns:1fr}}
    .card{
      background: rgba(0,0,0,.22);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 16px;
      padding: 14px;
      min-height: 92px;
    }
    .k{font-size:12px;color:var(--muted);margin-bottom:8px;display:flex;gap:8px;align-items:center}
    .v{font-size:18px;font-weight:900;display:flex;gap:10px;align-items:baseline}
    .v small{font-size:12px;color:var(--muted)}
    .badge{font-size:11px;padding:4px 8px;border-radius:999px;border:1px solid rgba(255,255,255,.10);background: rgba(255,255,255,.06);color:var(--muted)}
    .pos{color:var(--green)}
    .neg{color:var(--red)}
    .warn{color:var(--yellow)}

    /* sections */
    .section{padding:0 16px 16px}
    .grid2{display:grid;grid-template-columns: 1.15fr .85fr;gap:12px}
    @media (max-width: 900px){.grid2{grid-template-columns:1fr}}
    .box{
      background: rgba(0,0,0,.22);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 16px;
      padding: 14px;
    }
    .box h3{margin:0 0 10px;font-size:13px;letter-spacing:.2px}

    .grid4{display:grid;grid-template-columns: repeat(4,1fr);gap:10px}
    @media (max-width: 1100px){.grid4{grid-template-columns: repeat(2,1fr)}}
    @media (max-width: 520px){.grid4{grid-template-columns:1fr}}
    .metric{
      background: rgba(255,255,255,.05);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 14px;
      padding: 10px;
      min-height: 76px;
    }
    .metric .t{font-size:12px;color:var(--muted);margin-bottom:6px}
    .metric .n{font-size:16px;font-weight:900}
    .metric .s{font-size:12px;color:var(--muted2);margin-top:4px}

    /* valuation */
    .range{
      display:flex;gap:10px;align-items:center;flex-wrap:wrap;
      padding: 10px;
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.08);
      background: rgba(255,255,255,.04);
    }
    .pill2{
      display:inline-flex;align-items:center;gap:8px;
      padding: 8px 10px;border-radius:999px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.06);
      font-size: 12px;color:var(--muted);
    }
    .pill2 .dot{width:8px;height:8px;border-radius:50%}
    .dot.good{background: var(--green)}
    .dot.mid{background: var(--yellow)}
    .dot.bad{background: var(--red)}

    .bar{
      height: 10px;
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.08);
      border-radius: 999px;
      overflow:hidden;
      flex:1;
      min-width: 180px;
    }
    .bar > div{
      height:100%;
      width: 55%;
      background: linear-gradient(90deg, rgba(255,77,109,.95), rgba(255,209,102,.95), rgba(32,211,122,.95));
    }

    /* table */
    table{width:100%;border-collapse:separate;border-spacing:0 8px}
    td{
      padding:10px 10px;
      background: rgba(255,255,255,.04);
      border: 1px solid rgba(255,255,255,.08);
    }
    td:first-child{border-radius:12px 0 0 12px}
    td:last-child{border-radius:0 12px 12px 0;text-align:right;font-weight:800}
    .sub{font-size:12px;color:var(--muted2)}
    .muted{color:var(--muted2);font-size:12px;line-height:1.45}

    /* mini chart bars */
    .miniChart{
      display:grid;
      grid-template-columns: repeat(5, 1fr);
      gap: 10px;
      align-items:end;
      height: 150px;
      padding: 12px;
      border-radius: 16px;
      border: 1px dashed rgba(255,255,255,.12);
      background: linear-gradient(180deg, rgba(78,161,255,.06), rgba(32,211,122,.04));
    }
    .bcol{display:flex;flex-direction:column;gap:8px;align-items:center}
    .barv{
      width: 100%;
      border-radius: 12px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.05);
      position:relative;
      overflow:hidden;
    }
    .barv > i{
      display:block;
      width: 100%;
      height: 60%;
      background: linear-gradient(180deg, rgba(32,211,122,.85), rgba(78,161,255,.55));
    }
    .bcap{font-size:11px;color:var(--muted)}
    .bval{font-size:12px;font-weight:800}

    /* sentiment */
    .news{display:grid;gap:8px;margin-top:10px}
    .news .item{
      padding:10px;
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.08);
      background: rgba(255,255,255,.04);
      display:grid;
      grid-template-columns: 1fr auto;
      gap: 10px;
      align-items:center;
      font-size:12px;
      color:var(--muted);
    }
    .news .item strong{color:var(--text)}
  </style>
</head>
<body>
  <div class="wrap">
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
          <p>Analisis Fundamental — ringkas, terstruktur, dan mudah dipahami</p>
        </div>
      </div>
      <div class="actions">
        <div class="pill"><span class="dot"></span><span><strong>Fundamental</strong></span></div>
        <button class="btn" type="button" onclick="alert('Navigasi: kembali (dummy)')">← Kembali</button>
      </div>
    </div>

    <div class="grid">
      <!-- LEFT -->
      <div>
        <div class="panel">
          <div class="hd">
            <h2>Pilih Saham</h2>
            <span>Input & periode</span>
          </div>
          <div class="bd">
            <label for="ticker">Kode Emiten</label>
            <input id="ticker" class="field" value="BBCA" placeholder="Contoh: BBCA" />

            <div class="row" style="margin-top:12px">
              <div>
                <label for="period">Tahun / Kuartal</label>
                <select id="period" class="field">
                  <option>2025 Q3</option>
                  <option selected>2025 Q2</option>
                  <option>2025 Q1</option>
                  <option>2024 Q4</option>
                  <option>2024 Q3</option>
                </select>
              </div>
              <div>
                <label for="mode">Mode Analisis</label>
                <select id="mode" class="field">
                  <option selected>Ringkas</option>
                  <option>Detail</option>
                </select>
              </div>
            </div>

            <button class="primary" id="showBtn">Tampilkan Data</button>
            <div class="help">
              Demo UI menggunakan angka contoh (bukan data resmi). Nanti tinggal ganti dengan output API/engine.
            </div>
          </div>
        </div>

        <div class="panel" style="margin-top:14px">
          <div class="hd">
            <h2>Ringkasan Emiten</h2>
            <span>Profil singkat</span>
          </div>
          <div class="bd">
            <div class="grid4">
              <div class="metric">
                <div class="t">Perusahaan</div>
                <div class="n" id="co">PT Bank Central Asia Tbk</div>
                <div class="s sub">Ticker: <b id="coTick">BBCA</b> • Bursa: IDX</div>
              </div>
              <div class="metric">
                <div class="t">Sektor</div>
                <div class="n" id="sector">Perbankan</div>
                <div class="s sub">Subsektor: Bank</div>
              </div>
              <div class="metric">
                <div class="t">Market Cap</div>
                <div class="n pos" id="mcap">Rp 1.150 T</div>
                <div class="s sub">Kategori: Large Cap</div>
              </div>
              <div class="metric">
                <div class="t">Harga Saham</div>
                <div class="n" id="price">Rp 9.400</div>
                <div class="s sub">YTD: <span class="pos" id="ytd">+8,2%</span> • Beta: <b id="beta">0,85</b></div>
              </div>
            </div>

            <div class="line"></div>

            <div class="grid4">
              <div class="metric">
                <div class="t">Dividen Yield</div>
                <div class="n" id="div">2,1%</div>
                <div class="s sub">Kebijakan: stabil</div>
              </div>
              <div class="metric">
                <div class="t">EPS (TTM)</div>
                <div class="n" id="eps">Rp 420</div>
                <div class="s sub">Growth YoY: <span class="pos" id="epsg">+9%</span></div>
              </div>
              <div class="metric">
                <div class="t">Valuation (PER)</div>
                <div class="n" id="per">22,4x</div>
                <div class="s sub">TTM</div>
              </div>
              <div class="metric">
                <div class="t">Valuation (PBV)</div>
                <div class="n" id="pbv">4,2x</div>
                <div class="s sub">TTM</div>
              </div>
            </div>

            <div class="line"></div>
            <div class="help">
              *Angka contoh untuk kebutuhan tampilan UI. Gunakan data laporan keuangan resmi/IDX saat produksi.
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT -->
      <div class="panel">
        <div class="hd">
          <h2>Skor Fundamental & Kesimpulan</h2>
          <span>Ringkasan cepat + risk notes</span>
        </div>

        <div class="cards">
          <div class="card">
            <div class="k">Skor Fundamental</div>
            <div class="v"><span id="score">82</span><small>/ 100</small></div>
            <div class="k" style="margin-top:10px">Rating</div>
            <div class="v"><span class="pill2"><span class="dot good"></span><span id="rating">Strong</span></span></div>
          </div>
          <div class="card">
            <div class="k">Kualitas Bisnis</div>
            <div class="v"><span class="pos" id="biz">Kuat</span></div>
            <div class="k" style="margin-top:10px">Moat</div>
            <div class="v"><span class="badge">Brand</span> <span class="badge">CASA</span> <span class="badge">Distribusi</span></div>
          </div>
          <div class="card">
            <div class="k">Risiko Utama</div>
            <div class="v"><span class="warn" id="risk">Sedang</span></div>
            <div class="k" style="margin-top:10px">Catatan</div>
            <div class="help" id="riskNote">Sensitif terhadap siklus kredit & suku bunga, namun kualitas aset relatif terjaga.</div>
          </div>
        </div>

        <div class="section">
          <div class="grid2">
            <!-- ratios -->
            <div class="box">
              <h3>Rasio Keuangan (Perbankan)</h3>
              <div class="grid4">
                <div class="metric"><div class="t">ROE</div><div class="n pos" id="roe">18,6%</div><div class="s">profitabilitas ekuitas</div></div>
                <div class="metric"><div class="t">ROA</div><div class="n pos" id="roa">3,3%</div><div class="s">efisiensi aset</div></div>
                <div class="metric"><div class="t">NIM</div><div class="n pos" id="nim">5,6%</div><div class="s">margin bunga bersih</div></div>
                <div class="metric"><div class="t">BOPO</div><div class="n" id="bopo">58%</div><div class="s">semakin rendah lebih baik</div></div>

                <div class="metric"><div class="t">CASA</div><div class="n pos" id="casa">78%</div><div class="s">dana murah</div></div>
                <div class="metric"><div class="t">LDR</div><div class="n" id="ldr">64%</div><div class="s">likuiditas</div></div>
                <div class="metric"><div class="t">NPL Gross</div><div class="n" id="npl">1,8%</div><div class="s">kualitas kredit</div></div>
                <div class="metric"><div class="t">CAR</div><div class="n pos" id="car">25%</div><div class="s">permodalan</div></div>
              </div>

              <div class="line"></div>

              <h3>Valuasi (Estimasi)</h3>
              <div class="range" style="margin-bottom:10px">
                <span class="pill2"><span class="dot mid"></span><span id="valTag">Valuasi: Fair–Premium</span></span>
                <div class="bar" aria-label="valuation bar"><div id="valBar" style="width:62%"></div></div>
                <span class="badge">Undervalued</span>
                <span class="badge">Fair</span>
                <span class="badge">Premium</span>
              </div>

              <div class="grid4">
                <div class="metric">
                  <div class="t">Fair Value (PE Band)</div>
                  <div class="n" id="fvpe">Rp 8.900 – 9.700</div>
                  <div class="s">basis EPS & PE historis</div>
                </div>
                <div class="metric">
                  <div class="t">Fair Value (PBV Band)</div>
                  <div class="n" id="fvpbv">Rp 9.000 – 10.200</div>
                  <div class="s">basis BVPS & PBV historis</div>
                </div>
                <div class="metric">
                  <div class="t">Margin of Safety</div>
                  <div class="n" id="mos">~ 6%</div>
                  <div class="s">vs harga saat ini</div>
                </div>
                <div class="metric">
                  <div class="t">Kesimpulan Valuasi</div>
                  <div class="n" id="vsum">Mendekati fair</div>
                  <div class="s">cocok DCA</div>
                </div>
              </div>

              <div class="line"></div>
              <div class="muted">
                Catatan: Valuasi bersifat estimasi. Tidak menjamin return. Gunakan bersama analisis risiko & kondisi pasar.
              </div>
            </div>

            <!-- financials + trend -->
            <div class="box">
              <h3>Laporan Keuangan (Ringkas)</h3>
              <table>
                <tr><td>Pendapatan Operasional</td><td id="rev">Rp 108 T</td></tr>
                <tr><td>Laba Bersih</td><td class="pos" id="ni">Rp 42 T</td></tr>
                <tr><td>Growth Pendapatan (YoY)</td><td class="pos" id="revg">+10,8%</td></tr>
                <tr><td>Growth Laba (YoY)</td><td class="pos" id="nig">+9,6%</td></tr>
                <tr><td>Cost-to-Income (BOPO)</td><td id="cti">58%</td></tr>
              </table>

              <div class="line"></div>

              <h3>Tren 5 Kuartal (Revenue & Laba)</h3>
              <div class="miniChart" aria-label="mini chart">
                <div class="bcol">
                  <div class="barv" style="height:92px"><i style="height:64%"></i></div>
                  <div class="bval">96</div>
                  <div class="bcap">2024Q2</div>
                </div>
                <div class="bcol">
                  <div class="barv" style="height:104px"><i style="height:68%"></i></div>
                  <div class="bval">99</div>
                  <div class="bcap">2024Q3</div>
                </div>
                <div class="bcol">
                  <div class="barv" style="height:112px"><i style="height:72%"></i></div>
                  <div class="bval">102</div>
                  <div class="bcap">2024Q4</div>
                </div>
                <div class="bcol">
                  <div class="barv" style="height:124px"><i style="height:76%"></i></div>
                  <div class="bval">105</div>
                  <div class="bcap">2025Q1</div>
                </div>
                <div class="bcol">
                  <div class="barv" style="height:138px"><i style="height:80%"></i></div>
                  <div class="bval">108</div>
                  <div class="bcap">2025Q2</div>
                </div>
              </div>
              <div class="help" style="margin-top:10px">
                Angka pada grafik = revenue (Rp T) contoh untuk demo UI.
              </div>

              <div class="line"></div>

              <h3>Sentimen Berita (Dummy)</h3>
              <div class="range" style="justify-content:space-between">
                <span class="pill2"><span class="dot good"></span><span id="sent">Sentimen: Positif</span></span>
                <span class="badge">3 Positif</span>
                <span class="badge">1 Netral</span>
                <span class="badge">0 Negatif</span>
              </div>
              <div class="news">
                <div class="item"><div><strong>BBCA</strong> mencatat pertumbuhan kredit selektif dengan kualitas aset stabil.</div><div class="badge pos">Positif</div></div>
                <div class="item"><div><strong>CASA</strong> tetap tinggi, membantu menjaga NIM di tengah persaingan dana.</div><div class="badge pos">Positif</div></div>
                <div class="item"><div><strong>Digital banking</strong> mendorong efisiensi biaya operasional (BOPO).</div><div class="badge pos">Positif</div></div>
                <div class="item"><div>Risiko makro: perlambatan ekonomi berpotensi menekan demand kredit.</div><div class="badge warn">Netral</div></div>
              </div>

              <div class="line"></div>
              <h3>Kesimpulan AI (Dummy)</h3>
              <div class="muted" id="aiText">
                BBCA menunjukkan fundamental kuat (ROE tinggi, NPL rendah, CAR solid) dengan valuasi yang relatif mendekati fair.
                Strategi yang disarankan: <b>DCA / buy on weakness</b> untuk horizon menengah–panjang, dengan tetap memantau siklus suku bunga & kredit.
              </div>
              <div class="help" style="margin-top:8px">
                *Teks ini contoh output. Nanti bisa digenerate dari model/LLM berdasarkan input rasio & tren.
              </div>
            </div>
          </div>

          <div class="muted" style="text-align:center;margin-top:12px">
            *Demo UI — bukan rekomendasi investasi. Angka contoh untuk kebutuhan desain.
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Demo data switcher (BBCA only for now, easy to extend)
    const showBtn = document.getElementById('showBtn');
    const ticker = document.getElementById('ticker');
    const period = document.getElementById('period');

    function setText(id, val){ document.getElementById(id).textContent = val; }

    // Simple mapping per period (dummy)
    const bbca = {
      "2025 Q2": {
        price:"Rp 9.400", ytd:"+8,2%", mcap:"Rp 1.150 T", beta:"0,85",
        eps:"Rp 420", epsg:"+9%", per:"22,4x", pbv:"4,2x", div:"2,1%",
        roe:"18,6%", roa:"3,3%", nim:"5,6%", bopo:"58%", casa:"78%", ldr:"64%", npl:"1,8%", car:"25%",
        rev:"Rp 108 T", ni:"Rp 42 T", revg:"+10,8%", nig:"+9,6%", cti:"58%",
        fvpe:"Rp 8.900 – 9.700", fvpbv:"Rp 9.000 – 10.200", mos:"~ 6%", vsum:"Mendekati fair",
        score:"82", rating:"Strong", risk:"Sedang",
        riskNote:"Sensitif terhadap siklus kredit & suku bunga, namun kualitas aset relatif terjaga.",
        valTag:"Valuasi: Fair–Premium", valBar:62,
        sent:"Sentimen: Positif",
        aiText:"BBCA menunjukkan fundamental kuat (ROE tinggi, NPL rendah, CAR solid) dengan valuasi yang relatif mendekati fair. Strategi: DCA / buy on weakness untuk horizon menengah–panjang, sambil memantau siklus suku bunga & kredit."
      },
      "2024 Q4": {
        price:"Rp 9.050", ytd:"+3,4%", mcap:"Rp 1.080 T", beta:"0,86",
        eps:"Rp 408", epsg:"+7%", per:"22,2x", pbv:"4,1x", div:"2,2%",
        roe:"18,2%", roa:"3,2%", nim:"5,5%", bopo:"59%", casa:"77%", ldr:"65%", npl:"1,9%", car:"24%",
        rev:"Rp 102 T", ni:"Rp 40 T", revg:"+9,8%", nig:"+8,9%", cti:"59%",
        fvpe:"Rp 8.600 – 9.500", fvpbv:"Rp 8.800 – 10.000", mos:"~ 5%", vsum:"Fair",
        score:"80", rating:"Strong", risk:"Sedang",
        riskNote:"Kualitas aset stabil, namun kompetisi dana dapat menekan margin.",
        valTag:"Valuasi: Fair", valBar:56,
        sent:"Sentimen: Positif",
        aiText:"Fundamental tetap solid dengan profitabilitas stabil. Valuasi berada di area fair; cocok untuk akumulasi bertahap sambil memonitor margin dan kualitas kredit."
      }
    };

    function applyBBCA(){
      const p = period.value;
      const d = bbca[p] || bbca["2025 Q2"];
      ticker.value = "BBCA";
      setText("coTick","BBCA");
      setText("price", d.price);
      setText("ytd", d.ytd);
      setText("mcap", d.mcap);
      setText("beta", d.beta);
      setText("eps", d.eps);
      setText("epsg", d.epsg);
      setText("per", d.per);
      setText("pbv", d.pbv);
      setText("div", d.div);

      setText("roe", d.roe);
      setText("roa", d.roa);
      setText("nim", d.nim);
      setText("bopo", d.bopo);
      setText("casa", d.casa);
      setText("ldr", d.ldr);
      setText("npl", d.npl);
      setText("car", d.car);

      setText("rev", d.rev);
      setText("ni", d.ni);
      setText("revg", d.revg);
      setText("nig", d.nig);
      setText("cti", d.cti);

      setText("fvpe", d.fvpe);
      setText("fvpbv", d.fvpbv);
      setText("mos", d.mos);
      setText("vsum", d.vsum);

      setText("score", d.score);
      setText("rating", d.rating);
      setText("risk", d.risk);
      document.getElementById("riskNote").textContent = d.riskNote;

      setText("valTag", d.valTag);
      document.getElementById("valBar").style.width = (d.valBar||60) + "%";
      setText("sent", d.sent);
      document.getElementById("aiText").innerHTML = d.aiText;

      alert(`Data ditampilkan (demo)\nTicker: BBCA\nPeriode: ${p}\nCatatan: angka contoh untuk UI.`);
    }

    showBtn.addEventListener('click', ()=>{
      const t = ticker.value.trim().toUpperCase();
      if(!t || t === "BBCA"){
        applyBBCA();
      }else{
        alert("Demo ini hanya contoh BBCA. Kamu bisa duplikasi object data untuk emiten lain.");
      }
    });
  </script>
</body>
</html>
