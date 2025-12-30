<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>DEKAP — UI Mockup (Web)</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --bg: #0b0b10;
      --panel: rgba(255,255,255,.06);
      --panel2: rgba(255,255,255,.08);
      --stroke: rgba(255,255,255,.12);
      --text: rgba(255,255,255,.92);
      --muted: rgba(255,255,255,.62);
      --muted2: rgba(255,255,255,.48);

      /* DEKAP-ish: ungu → oranye */
      --p1:#6a2bbf;   /* purple */
      --p2:#ff8a00;   /* orange */
      --p3:#ffb200;   /* yellow-ish */
      --good:#42d392;
      --warn:#ffb020;
      --bad:#ff4d6d;

      --radius: 18px;
      --radius2: 26px;
      --shadow: 0 20px 60px rgba(0,0,0,.55);
      --shadow2: 0 10px 24px rgba(0,0,0,.35);
    }

    *{ box-sizing: border-box; }
    body{
      margin:0;
      font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      background:
        radial-gradient(1000px 700px at 15% 15%, rgba(106,43,191,.25), transparent 60%),
        radial-gradient(900px 700px at 85% 25%, rgba(255,138,0,.20), transparent 55%),
        radial-gradient(800px 600px at 55% 90%, rgba(255,178,0,.12), transparent 60%),
        var(--bg);
      color: var(--text);
      min-height:100vh;
    }

    .wrap{
      width:min(1200px, 92vw);
      margin: 28px auto 56px;
    }

    .topbar{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:14px;
      padding: 14px 16px;
      border: 1px solid var(--stroke);
      background: rgba(0,0,0,.25);
      backdrop-filter: blur(10px);
      border-radius: var(--radius2);
      box-shadow: var(--shadow2);
    }

    .brand{
      display:flex; align-items:center; gap:12px;
    }
    .logo{
      width:38px; height:38px;
      border-radius: 14px;
      background: linear-gradient(135deg, var(--p1), var(--p2));
      display:grid; place-items:center;
      box-shadow: 0 10px 24px rgba(106,43,191,.18);
      border: 1px solid rgba(255,255,255,.18);
      position:relative;
      overflow:hidden;
    }
    .logo:before{
      content:"";
      position:absolute; inset:-40%;
      background: radial-gradient(circle at 30% 30%, rgba(255,255,255,.18), transparent 45%);
      transform: rotate(18deg);
    }
    .logo svg{ position:relative; opacity:.9 }
    .brand h1{
      font-size: 14px;
      line-height:1.1;
      margin:0;
      letter-spacing:.2px;
    }
    .brand p{
      margin:3px 0 0;
      font-size:12px;
      color: var(--muted);
    }

    .actions{
      display:flex; gap:10px; align-items:center;
    }
    .chip{
      display:flex; align-items:center; gap:8px;
      padding: 8px 10px;
      border-radius: 999px;
      border: 1px solid var(--stroke);
      background: rgba(255,255,255,.06);
      color: var(--muted);
      font-size:12px;
      white-space:nowrap;
    }
    .btn{
      cursor:pointer;
      border: 1px solid rgba(255,255,255,.18);
      background: rgba(255,255,255,.06);
      color: var(--text);
      padding: 9px 12px;
      border-radius: 12px;
      font-weight:600;
      font-size:12px;
      transition: .15s ease;
    }
    .btn:hover{ transform: translateY(-1px); background: rgba(255,255,255,.09); }
    .btn.primary{
      border: none;
      background: linear-gradient(135deg, var(--p1), var(--p2));
      box-shadow: 0 12px 30px rgba(255,138,0,.15);
    }

    .grid{
      display:grid;
      grid-template-columns: 260px 1fr 340px;
      gap: 16px;
      margin-top: 16px;
    }

    .panel{
      border: 1px solid var(--stroke);
      background: rgba(255,255,255,.05);
      backdrop-filter: blur(10px);
      border-radius: var(--radius2);
      box-shadow: var(--shadow2);
      overflow:hidden;
    }

    /* Sidebar */
    .sidebar{
      padding: 14px;
    }
    .kid{
      display:flex; align-items:center; justify-content:space-between;
      gap:10px;
      padding: 12px;
      border-radius: 16px;
      border: 1px solid var(--stroke);
      background: rgba(0,0,0,.18);
      margin-bottom: 12px;
    }
    .kid .left{ display:flex; align-items:center; gap:10px; }
    .avatar{
      width:34px; height:34px;
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.18);
      background:
        radial-gradient(circle at 30% 25%, rgba(255,255,255,.16), transparent 55%),
        linear-gradient(135deg, rgba(106,43,191,.65), rgba(255,138,0,.55));
      display:grid; place-items:center;
      font-weight:800;
    }
    .kid .name{ font-weight:700; font-size:13px; }
    .kid .meta{ font-size:12px; color: var(--muted); margin-top:2px; }
    .dots{ opacity:.7; }

    .nav{
      display:flex;
      flex-direction:column;
      gap: 8px;
      margin-top: 10px;
    }
    .nav button{
      width:100%;
      text-align:left;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:10px;
      border:none;
      background: rgba(255,255,255,.04);
      color: var(--text);
      padding: 11px 12px;
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.10);
      cursor:pointer;
      transition: .15s ease;
      font-weight:600;
      font-size:13px;
    }
    .nav button:hover{
      background: rgba(255,255,255,.07);
      transform: translateY(-1px);
    }
    .nav button.active{
      background: linear-gradient(135deg, rgba(106,43,191,.35), rgba(255,138,0,.22));
      border-color: rgba(255,255,255,.16);
    }
    .badge{
      font-size:11px;
      color: rgba(0,0,0,.85);
      font-weight:800;
      padding: 4px 8px;
      border-radius: 999px;
      background: linear-gradient(135deg, var(--p3), var(--p2));
    }

    .sidehint{
      margin-top: 12px;
      padding: 12px;
      border-radius: 16px;
      border: 1px dashed rgba(255,255,255,.18);
      color: var(--muted);
      font-size:12px;
      line-height: 1.35;
    }

    /* Main */
    .main{
      padding: 14px;
      display:flex;
      flex-direction:column;
      gap: 12px;
    }

    .tabs{
      display:flex;
      gap: 8px;
      flex-wrap:wrap;
      padding: 10px;
      border-radius: 18px;
      border: 1px solid var(--stroke);
      background: rgba(0,0,0,.18);
    }
    .tab{
      border:none;
      cursor:pointer;
      padding: 10px 12px;
      border-radius: 14px;
      background: rgba(255,255,255,.04);
      color: var(--muted);
      font-weight:700;
      font-size:12px;
      transition:.15s ease;
      display:flex; gap:8px; align-items:center;
    }
    .tab.active{
      color: var(--text);
      background: linear-gradient(135deg, rgba(106,43,191,.35), rgba(255,138,0,.18));
      border: 1px solid rgba(255,255,255,.12);
    }

    .content{
      display:grid;
      grid-template-columns: 1fr 280px;
      gap: 12px;
      align-items:start;
    }

    .card{
      border: 1px solid var(--stroke);
      background: rgba(255,255,255,.05);
      border-radius: var(--radius2);
      padding: 14px;
      box-shadow: var(--shadow2);
    }
    .card h2{
      margin:0 0 10px;
      font-size:14px;
      letter-spacing:.2px;
    }
    .sub{
      color: var(--muted);
      font-size:12px;
      margin-top:-6px;
      margin-bottom: 10px;
    }

    .timeline{
      display:flex;
      flex-direction:column;
      gap:10px;
      max-height: 520px;
      overflow:auto;
      padding-right: 6px;
    }
    .event{
      display:grid;
      grid-template-columns: 34px 1fr auto;
      gap:10px;
      align-items:start;
      padding: 12px;
      border-radius: 18px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(0,0,0,.18);
    }
    .dot{
      width:34px; height:34px;
      border-radius: 14px;
      display:grid; place-items:center;
      font-weight:900;
      border: 1px solid rgba(255,255,255,.16);
      background: rgba(255,255,255,.06);
    }
    .dot.bad{ background: rgba(255,77,109,.18); }
    .dot.warn{ background: rgba(255,176,32,.18); }
    .dot.good{ background: rgba(66,211,146,.16); }

    .event .title{
      font-weight:800;
      font-size:13px;
      margin:0;
    }
    .event .meta{
      color: var(--muted);
      font-size:12px;
      margin-top: 4px;
      line-height: 1.35;
    }
    .pill{
      font-size:11px;
      font-weight:900;
      padding: 6px 10px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.06);
      color: var(--text);
      white-space:nowrap;
    }
    .pill.bad{ border-color: rgba(255,77,109,.45); background: rgba(255,77,109,.14); }
    .pill.warn{ border-color: rgba(255,176,32,.45); background: rgba(255,176,32,.14); }
    .pill.good{ border-color: rgba(66,211,146,.40); background: rgba(66,211,146,.12); }

    .mini{
      display:flex;
      flex-direction:column;
      gap: 12px;
    }
    .mini .box{
      border-radius: 18px;
      padding: 12px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(0,0,0,.18);
    }
    .kpi{
      display:grid;
      grid-template-columns: 1fr 1fr;
      gap: 10px;
      margin-top: 8px;
    }
    .kpi .k{
      border-radius: 16px;
      padding: 10px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.04);
    }
    .k .label{ font-size:11px; color: var(--muted); }
    .k .val{ font-size:14px; font-weight:900; margin-top:4px; }

    .chart{
      margin-top: 10px;
      border-radius: 16px;
      padding: 10px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(255,255,255,.04);
    }
    .bars{
      display:flex; gap:8px; align-items:flex-end;
      height: 84px;
      margin-top: 6px;
    }
    .bar{
      flex:1;
      border-radius: 10px;
      background: linear-gradient(180deg, rgba(106,43,191,.75), rgba(255,138,0,.65));
      opacity:.9;
    }
    .bar:nth-child(2){ height: 55%; }
    .bar:nth-child(3){ height: 80%; }
    .bar:nth-child(4){ height: 65%; }
    .bar:nth-child(5){ height: 92%; }
    .bar:nth-child(6){ height: 48%; }

    /* Right panel (Notifications) */
    .right{
      padding: 14px;
      display:flex;
      flex-direction:column;
      gap: 12px;
    }
    .alert{
      border-radius: 18px;
      padding: 12px;
      border: 1px solid rgba(255,255,255,.12);
      background: linear-gradient(135deg, rgba(106,43,191,.30), rgba(255,138,0,.18));
    }
    .alert .h{
      display:flex; align-items:center; justify-content:space-between;
      gap:10px;
      font-weight:900;
    }
    .alert .p{
      margin-top: 8px;
      color: var(--muted);
      font-size:12px;
      line-height: 1.35;
    }
    .notiList{
      display:flex;
      flex-direction:column;
      gap: 10px;
      max-height: 380px;
      overflow:auto;
      padding-right: 6px;
    }
    .noti{
      border-radius: 18px;
      padding: 12px;
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(0,0,0,.18);
      display:flex;
      gap:10px;
      align-items:flex-start;
    }
    .ic{
      width:34px; height:34px;
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.14);
      display:grid; place-items:center;
      background: rgba(255,255,255,.06);
      flex: 0 0 auto;
      font-weight:900;
    }
    .noti .t{ font-weight:800; font-size:13px; margin:0; }
    .noti .d{ color: var(--muted); font-size:12px; margin-top: 4px; line-height: 1.35; }
    .footnote{
      color: var(--muted2);
      font-size:11px;
      line-height: 1.35;
      padding: 12px;
      border-radius: 18px;
      border: 1px dashed rgba(255,255,255,.14);
      background: rgba(0,0,0,.12);
    }

    /* Mobile preview mock (optional visual) */
    .phoneWrap{
      margin-top: 18px;
      display:flex;
      gap: 14px;
      align-items:flex-start;
      flex-wrap:wrap;
    }
    .phone{
      width: 330px;
      border-radius: 34px;
      border: 1px solid rgba(255,255,255,.16);
      background: rgba(0,0,0,.28);
      box-shadow: var(--shadow);
      overflow:hidden;
    }
    .phone .top{
      padding: 14px 14px 10px;
      background: linear-gradient(135deg, rgba(106,43,191,.35), rgba(255,138,0,.22));
      border-bottom: 1px solid rgba(255,255,255,.10);
    }
    .phone .top .row{
      display:flex; justify-content:space-between; align-items:center;
      font-size:12px; color: var(--muted);
      font-weight:700;
    }
    .phone .top h3{
      margin: 10px 0 0;
      font-size: 14px;
      letter-spacing:.2px;
    }
    .phone .body{
      padding: 12px;
      display:flex;
      flex-direction:column;
      gap: 10px;
    }
    .phone .cta{
      display:flex; gap: 8px;
    }
    .phone .cta button{
      flex:1;
      border:none;
      padding: 10px 10px;
      border-radius: 14px;
      font-weight:900;
      font-size:12px;
      color: var(--text);
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.12);
      cursor:pointer;
    }
    .phone .cta button.primary{
      border:none;
      background: linear-gradient(135deg, var(--p1), var(--p2));
    }

    /* Responsive */
    @media (max-width: 1020px){
      .grid{ grid-template-columns: 1fr; }
      .content{ grid-template-columns: 1fr; }
    }
  </style>
</head>

<body>
  <div class="wrap">

    <!-- TOPBAR -->
    <div class="topbar">
      <div class="brand">
        <div class="logo" aria-hidden="true" title="DEKAP">
          <!-- simple puzzle+hands icon -->
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
            <path d="M8.5 4h5c.7 0 1.2.5 1.2 1.2V7c0 .5.5.9 1 .7 1.4-.6 3 .3 3.4 1.8.4 1.6-.6 3.1-2.2 3.3-.5.1-.9.5-.9 1v1.7c0 .7-.5 1.2-1.2 1.2h-2.2" stroke="rgba(255,255,255,.9)" stroke-width="1.6" stroke-linecap="round"/>
            <path d="M15.2 19.1H8.5c-.7 0-1.2-.5-1.2-1.2v-1.6c0-.5-.5-.9-1-.7-1.4.6-3-.3-3.4-1.8-.4-1.6.6-3.1 2.2-3.3.5-.1.9-.5.9-1V5.2C6 4.5 6.5 4 7.2 4h1.3" stroke="rgba(255,255,255,.65)" stroke-width="1.6" stroke-linecap="round"/>
          </svg>
        </div>
        <div>
          <h1>DEKAP — Monitoring Tantrum & Perilaku</h1>
          <p>Wearable + AI multimodal • Edge-first • Privasi terjaga</p>
        </div>
      </div>

      <div class="actions">
        <div class="chip">👤 Caregiver Mode</div>
        <button class="btn">Ekspor PDF</button>
        <button class="btn primary">+ Catat Kejadian</button>
      </div>
    </div>

    <!-- MAIN GRID -->
    <div class="grid">
      <!-- SIDEBAR -->
      <aside class="panel sidebar">
        <div class="kid">
          <div class="left">
            <div class="avatar">S</div>
            <div>
              <div class="name">Stevan</div>
              <div class="meta">3 tahun • ID: DKP-1024</div>
            </div>
          </div>
          <div class="dots">⋯</div>
        </div>

        <nav class="nav" aria-label="Navigasi fitur">
          <button class="active" data-tab="riwayat">
            <span>Riwayat Tantrum</span><span class="badge">Baru</span>
          </button>
          <button data-tab="rekomendasi">
            <span>Rekomendasi Penanganan</span><span class="badge">AI</span>
          </button>
          <button data-tab="laporan">
            <span>Laporan Bulanan</span><span class="badge">PDF</span>
          </button>
          <button data-tab="notifikasi">
            <span>Notifikasi Realtime</span><span class="badge">3</span>
          </button>
        </nav>

        <div class="sidehint">
          <b>Catatan privasi:</b> data mikrofon hanya <i>level dB</i> (tanpa rekaman audio). Pemrosesan dilakukan di perangkat (edge) dan cloud bersifat opsional.
        </div>
      </aside>

      <!-- CENTER -->
      <main class="panel main">
        <div class="tabs" role="tablist" aria-label="Tab utama">
          <button class="tab active" data-tab="riwayat">🗓️ Riwayat Tantrum</button>
          <button class="tab" data-tab="rekomendasi">🧠 Rekomendasi</button>
          <button class="tab" data-tab="laporan">📊 Laporan Bulanan</button>
          <button class="tab" data-tab="notifikasi">🔔 Notifikasi</button>
        </div>

        <section class="content">
          <div class="card" id="panel-left">
            <h2 id="section-title">Riwayat Tantrum</h2>
            <div class="sub" id="section-sub">
              Rekaman kejadian disusun kronologis untuk evaluasi jangka panjang (filter: semua rentang).
            </div>

            <div class="timeline" id="timeline">
              <div class="event">
                <div class="dot bad">!</div>
                <div>
                  <p class="title">Risiko Tinggi — Tantrum terdeteksi</p>
                  <div class="meta">
                    24 Apr 2026 • 15:31 • Durasi 9 menit<br/>
                    Indikasi: GSR naik cepat, gerakan intens, kebisingan tinggi (dB).
                  </div>
                </div>
                <span class="pill bad">Tinggi</span>
              </div>

              <div class="event">
                <div class="dot warn">!</div>
                <div>
                  <p class="title">Risiko Sedang — Potensi eskalasi</p>
                  <div class="meta">
                    24 Apr 2026 • 10:08 • Durasi 4 menit<br/>
                    Indikasi: gerakan repetitif meningkat, GSR moderat.
                  </div>
                </div>
                <span class="pill warn">Sedang</span>
              </div>

              <div class="event">
                <div class="dot bad">!</div>
                <div>
                  <p class="title">Risiko Tinggi — Tantrum terdeteksi</p>
                  <div class="meta">
                    23 Apr 2026 • 19:42 • Durasi 12 menit<br/>
                    Indikasi: GSR tinggi persisten, pola gerak tidak stabil.
                  </div>
                </div>
                <span class="pill bad">Tinggi</span>
              </div>

              <div class="event">
                <div class="dot good">✓</div>
                <div>
                  <p class="title">Kondisi Stabil — Tidak ada indikasi</p>
                  <div class="meta">
                    23 Apr 2026 • 14:05 • Monitoring 30 menit<br/>
                    Indikasi: GSR & gerakan dalam baseline individu.
                  </div>
                </div>
                <span class="pill good">Rendah</span>
              </div>
            </div>
          </div>

          <div class="mini">
            <div class="card">
              <h2>Ringkasan Hari Ini</h2>
              <div class="sub">Indikator cepat untuk keputusan caregiver.</div>

              <div class="kpi">
                <div class="k">
                  <div class="label">Jumlah kejadian</div>
                  <div class="val">3</div>
                </div>
                <div class="k">
                  <div class="label">Risiko tertinggi</div>
                  <div class="val">Tinggi</div>
                </div>
                <div class="k">
                  <div class="label">Durasi total</div>
                  <div class="val">25 mnt</div>
                </div>
                <div class="k">
                  <div class="label">Kepatuhan intervensi</div>
                  <div class="val">78%</div>
                </div>
              </div>

              <div class="chart" aria-label="Grafik ringkas tren">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                  <div style="font-weight:800; font-size:12px;">Tren Risiko (7 hari)</div>
                  <div style="color:var(--muted); font-size:11px;">ringkas</div>
                </div>
                <div class="bars">
                  <div class="bar" style="height:60%"></div>
                  <div class="bar"></div>
                  <div class="bar"></div>
                  <div class="bar"></div>
                  <div class="bar"></div>
                  <div class="bar"></div>
                </div>
              </div>
            </div>

            <div class="card">
              <h2>Rekomendasi Cepat</h2>
              <div class="sub">Berdasarkan pola sensor terbaru.</div>
              <div class="box">
                <div style="font-weight:900; font-size:13px;">Saat risiko tinggi</div>
                <div style="color:var(--muted); font-size:12px; line-height:1.35; margin-top:6px;">
                  1) Kurangi stimulus (suara/cahaya) • 2) Teknik napas/tekanan dalam (deep pressure) •
                  3) Alihkan aktivitas terstruktur • 4) Catat pemicu.
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Optional: Mobile preview mock inside same HTML -->
        <div class="phoneWrap">
          <div class="phone" aria-label="Mockup tampilan mobile">
            <div class="top">
              <div class="row">
                <span>09:18</span>
                <span>🔋 78% • LTE</span>
              </div>
              <h3>Notifikasi Realtime</h3>
            </div>
            <div class="body">
              <div class="alert">
                <div class="h">
                  <span>⚠️ Risiko Tantrum Tinggi</span>
                  <span class="pill bad">Tinggi</span>
                </div>
                <div class="p">
                  Indikasi: GSR naik cepat + gerakan intens. Lakukan de-eskalasi sekarang dan klik “Panduan”.
                </div>
              </div>

              <div class="cta">
                <button class="primary">Panduan</button>
                <button>Detail</button>
              </div>

              <div class="noti">
                <div class="ic">🗓️</div>
                <div>
                  <p class="t">Tercatat ke Riwayat</p>
                  <div class="d">Kejadian 24 Apr 2026 15:31 tersimpan otomatis.</div>
                </div>
              </div>

              <div class="noti">
                <div class="ic">📊</div>
                <div>
                  <p class="t">Update Laporan Bulanan</p>
                  <div class="d">Ringkasan tren akan dihitung pada akhir bulan.</div>
                </div>
              </div>
            </div>
          </div>

          <div class="footnote">
            <b>Catatan:</b> Ini adalah <i>UI mockup</i> untuk kebutuhan penelitian/presentasi (bukan implementasi sensor).
            Anda bisa mengganti data dummy (nama anak, waktu kejadian, indikator) sesuai skenario uji.
          </div>
        </div>
      </main>

      <!-- RIGHT -->
      <aside class="panel right">
        <div class="alert">
          <div class="h">
            <span>🔔 Peringatan Aktif</span>
            <span class="pill warn">Sedang</span>
          </div>
          <div class="p">
            Sistem mendeteksi pola peningkatan aktivitas. Siapkan strategi penanganan bila eskalasi berlanjut.
          </div>
          <div style="margin-top:10px; display:flex; gap:8px;">
            <button class="btn" style="flex:1;">Lihat Panduan</button>
            <button class="btn primary" style="flex:1;">Tandai Selesai</button>
          </div>
        </div>

        <div class="card">
          <h2>Notifikasi Terbaru</h2>
          <div class="sub">Prioritas berdasarkan skor risiko.</div>

          <div class="notiList">
            <div class="noti">
              <div class="ic">⚠️</div>
              <div>
                <p class="t">Risiko Tinggi</p>
                <div class="d">24 Apr • 15:31 — Indikasi stres tinggi (GSR) & gerakan intens.</div>
              </div>
            </div>

            <div class="noti">
              <div class="ic">⚠️</div>
              <div>
                <p class="t">Risiko Sedang</p>
                <div class="d">24 Apr • 10:08 — Potensi eskalasi, lakukan pengurangan stimulus.</div>
              </div>
            </div>

            <div class="noti">
              <div class="ic">✅</div>
              <div>
                <p class="t">Kondisi Stabil</p>
                <div class="d">23 Apr • 14:05 — Dalam baseline individu.</div>
              </div>
            </div>
          </div>
        </div>

        <div class="footnote">
          <b>Edge-first:</b> analisis dilakukan di aplikasi mobile (latensi rendah). <b>Cloud opsional</b> untuk backup non-identitas & pembaruan model (federated).
        </div>
      </aside>
    </div>
  </div>

  <script>
    // Simple tab switching (demo)
    const navBtns = Array.from(document.querySelectorAll('.nav button'));
    const tabBtns = Array.from(document.querySelectorAll('.tab'));
    const title = document.getElementById('section-title');
    const sub = document.getElementById('section-sub');
    const timeline = document.getElementById('timeline');

    const contentMap = {
      riwayat: {
        title: "Riwayat Tantrum",
        sub: "Rekaman kejadian disusun kronologis untuk evaluasi jangka panjang (filter: semua rentang).",
        html: timeline.innerHTML
      },
      rekomendasi: {
        title: "Rekomendasi Penanganan",
        sub: "Saran intervensi berbasis pola data dan kondisi terkini anak.",
        html: `
          <div class="event">
            <div class="dot warn">🧠</div>
            <div>
              <p class="title">Saat risiko sedang (3–5 menit awal)</p>
              <div class="meta">
                • Kurangi stimulus (suara/cahaya) <br/>
                • Arahkan ke aktivitas terstruktur (mainan sensorik) <br/>
                • Gunakan instruksi singkat & konsisten
              </div>
            </div>
            <span class="pill warn">Prioritas</span>
          </div>
          <div class="event">
            <div class="dot bad">🧠</div>
            <div>
              <p class="title">Saat risiko tinggi (tantrum terdeteksi)</p>
              <div class="meta">
                • Terapkan de-eskalasi (napas, deep pressure bila sesuai) <br/>
                • Jaga keamanan (hindari benda berbahaya) <br/>
                • Catat pemicu untuk evaluasi
              </div>
            </div>
            <span class="pill bad">Tinggi</span>
          </div>
          <div class="event">
            <div class="dot good">🧠</div>
            <div>
              <p class="title">Pasca kejadian</p>
              <div class="meta">
                • Beri waktu tenang & rutinitas kembali <br/>
                • Review riwayat: pola jam/pemicu/sinyal <br/>
                • Diskusikan dengan terapis bila frekuensi meningkat
              </div>
            </div>
            <span class="pill good">Stabil</span>
          </div>
        `
      },
      laporan: {
        title: "Laporan Bulanan",
        sub: "Ringkasan tren perilaku & kondisi fisiologis untuk mendukung pengambilan keputusan.",
        html: `
          <div class="event">
            <div class="dot">📊</div>
            <div>
              <p class="title">Ringkasan April 2026</p>
              <div class="meta">
                • Total kejadian: 22 • Risiko tinggi: 7 • Durasi rata-rata: 8 menit <br/>
                • Tren GSR: meningkat pada sore hari <br/>
                • Rekomendasi: fokus manajemen stimulus jam 15:00–18:00
              </div>
            </div>
            <span class="pill">Unduh</span>
          </div>
          <div class="event">
            <div class="dot">📈</div>
            <div>
              <p class="title">Insight Pemicu (Top 3)</p>
              <div class="meta">
                1) Kebisingan tinggi • 2) Kelelahan • 3) Perubahan rutinitas
              </div>
            </div>
            <span class="pill warn">Insight</span>
          </div>
          <div class="event">
            <div class="dot">🧾</div>
            <div>
              <p class="title">Catatan untuk Terapis</p>
              <div class="meta">
                Sertakan grafik ringkas dan 5 kejadian risiko tinggi paling representatif.
              </div>
            </div>
            <span class="pill good">Siap</span>
          </div>
        `
      },
      notifikasi: {
        title: "Notifikasi Realtime",
        sub: "Peringatan dini & prioritas tingkat risiko untuk intervensi cepat.",
        html: `
          <div class="event">
            <div class="dot bad">🔔</div>
            <div>
              <p class="title">Peringatan: Risiko Tantrum Tinggi</p>
              <div class="meta">
                Indikasi: GSR ↑ cepat + gerakan intens + dB tinggi. <br/>
                Tindakan: lakukan de-eskalasi sekarang.
              </div>
            </div>
            <span class="pill bad">Tinggi</span>
          </div>
          <div class="event">
            <div class="dot warn">🔔</div>
            <div>
              <p class="title">Peringatan: Risiko Sedang</p>
              <div class="meta">
                Indikasi: pola repetitif meningkat. <br/>
                Tindakan: kurangi stimulus & pantau 5 menit.
              </div>
            </div>
            <span class="pill warn">Sedang</span>
          </div>
          <div class="event">
            <div class="dot good">🔔</div>
            <div>
              <p class="title">Info: Kembali Stabil</p>
              <div class="meta">
                Indikator kembali ke baseline individu.
              </div>
            </div>
            <span class="pill good">Rendah</span>
          </div>
        `
      }
    };

    function setActiveTab(key){
      // update active states
      navBtns.forEach(b => b.classList.toggle('active', b.dataset.tab === key));
      tabBtns.forEach(b => b.classList.toggle('active', b.dataset.tab === key));

      // update content
      title.textContent = contentMap[key].title;
      sub.textContent = contentMap[key].sub;
      timeline.innerHTML = contentMap[key].html;
    }

    navBtns.forEach(btn => btn.addEventListener('click', () => setActiveTab(btn.dataset.tab)));
    tabBtns.forEach(btn => btn.addEventListener('click', () => setActiveTab(btn.dataset.tab)));
  </script>
</body>
</html>
