<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DEKAP | Dashboard</title>

  <style>
    :root{
      --bg-main:#0B0B10;
      --primary:#5B1E5D;
      --secondary:#7A2E4F;
      --accent:#F2A31B;
      --text-main:#F5F3FF;
      --text-muted:#B8AFC7;
      --border-soft:rgba(255,255,255,.14);
      --radius:18px;
      --shadow:0 24px 70px rgba(0,0,0,.55);
    }

    *{box-sizing:border-box}

    body{
      margin:0;
      min-height:100vh;
      font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      color:var(--text-main);
      background:
        radial-gradient(900px 520px at 18% 12%, rgba(91,30,93,.48), transparent 62%),
        radial-gradient(900px 520px at 82% 88%, rgba(242,163,27,.35), transparent 62%),
        linear-gradient(180deg,#0B0B10,#0E0E1A);
      padding:24px;
    }

    .container{
      max-width:1100px;
      margin:auto;
    }

    .header{
      display:flex;
      justify-content:space-between;
      align-items:flex-start;
      gap:16px;
      margin-bottom:22px;
    }

    .title{
      margin:0;
      font-size:28px;
      font-weight:900;
      letter-spacing:.2px;
    }

    .subtitle{
      margin-top:6px;
      font-size:13.5px;
      color:var(--text-muted);
      max-width:720px;
      line-height:1.45;
    }

    .logout{
      padding:10px 16px;
      border-radius:999px;
      border:1px solid var(--border-soft);
      background:rgba(0,0,0,.15);
      color:var(--text-main);
      cursor:pointer;
      transition:transform .15s ease, border-color .15s ease;
    }
    .logout:hover{
      transform:translateY(-1px);
      border-color:rgba(242,163,27,.6);
    }

    /* ===== GRID UTAMA (3 KARTU) ===== */
    .menu{
      display:grid;
      grid-template-columns:repeat(3,1fr);
      gap:20px;
    }

    /* ===== BARIS BAWAH (2 KARTU) -> DI-TENGAH ===== */
    .menu-bottom{
      margin-top:20px;
      display:grid;
      grid-template-columns:repeat(2,1fr);
      gap:20px;
      max-width:760px;        /* bikin baris bawah tidak selebar baris atas */
      margin-left:auto;
      margin-right:auto;      /* ini yang membuat posisinya benar-benar tengah */
    }

    @media(max-width:900px){
      .menu{grid-template-columns:repeat(2,1fr)}
      .menu-bottom{
        max-width:100%;
        grid-template-columns:repeat(2,1fr);
      }
    }

    @media(max-width:600px){
      .menu{grid-template-columns:1fr}
      .menu-bottom{grid-template-columns:1fr}
      .header{align-items:flex-start}
    }

    .card{
      padding:22px;
      border-radius:var(--radius);
      border:1px solid var(--border-soft);
      background:linear-gradient(180deg,rgba(20,20,39,.96),rgba(14,14,26,.96));
      box-shadow:var(--shadow);
      cursor:pointer;
      transition:transform .2s ease, box-shadow .2s ease, border-color .2s ease;
      min-height:138px;
    }

    .card:hover{
      transform:translateY(-4px);
      box-shadow:0 30px 85px rgba(0,0,0,.65);
      border-color:rgba(242,163,27,.35);
    }

    .icon{
      width:52px;
      height:52px;
      border-radius:16px;
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:22px;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
      color:#140615;
      font-weight:900;
      margin-bottom:14px;
      box-shadow:0 14px 34px rgba(0,0,0,.35);
    }

    .card h3{
      margin:0 0 8px;
      font-size:18px;
      font-weight:900;
      letter-spacing:.1px;
    }

    .card p{
      margin:0;
      font-size:13.5px;
      color:var(--text-muted);
      line-height:1.55;
    }

    .footer{
      margin-top:26px;
      text-align:center;
      font-size:11.5px;
      color:rgba(184,175,199,.85);
    }
  </style>
</head>

<body>

  <div class="container">

    <!-- HEADER -->
    <div class="header">
      <div>
        <p class="title">Dashboard DEKAP</p>
        <p class="subtitle">
          Sistem pemantauan perilaku anak berbasis wearable & AI multimodal. Pilih fitur untuk melihat riwayat,
          memperoleh rekomendasi penanganan, ringkasan bulanan, notifikasi realtime, serta koneksi perangkat wearable.
        </p>
      </div>
      <button class="logout">Keluar</button>
    </div>

    <!-- BARIS ATAS (3 KARTU) -->
    <div class="menu">

      <div class="card" onclick="location.href='riwayat-tantrum.html'">
        <div class="icon">📊</div>
        <h3>Riwayat Tantrum</h3>
        <p>Rekaman kejadian tantrum secara kronologis untuk evaluasi jangka panjang.</p>
      </div>

      <div class="card" onclick="location.href='rekomendasi-penanganan.html'">
        <div class="icon">🧠</div>
        <h3>Rekomendasi Penanganan</h3>
        <p>Saran intervensi berbasis pola data dan kondisi terkini anak.</p>
      </div>

      <div class="card" onclick="location.href='laporan-bulanan.html'">
        <div class="icon">📅</div>
        <h3>Laporan Bulanan</h3>
        <p>Ringkasan tren perilaku dan kondisi fisiologis untuk pengambilan keputusan.</p>
      </div>

    </div>

    <!-- BARIS BAWAH (2 KARTU) -> TENGAH -->
    <div class="menu-bottom">

      <div class="card" onclick="location.href='notifikasi-realtime.html'">
        <div class="icon">⚠️</div>
        <h3>Notifikasi Realtime</h3>
        <p>Peringatan dini saat terdeteksi potensi tantrum atau kondisi abnormal.</p>
      </div>

      <div class="card" onclick="location.href='connect-wearable.html'">
        <div class="icon">⌚</div>
        <h3>Connect Wearable</h3>
        <p>Menghubungkan aplikasi dengan wearable device untuk pemantauan real-time.</p>
      </div>

    </div>

    <div class="footer">© 2026 DEKAP</div>

  </div>

</body>
</html>
