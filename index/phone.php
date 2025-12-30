<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DEKAP | Dashboard Mobile</title>

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
      padding:18px 16px 26px;
    }

    .container{
      width:min(520px,100%);
      margin:auto;
    }

    .header{
      display:flex;
      justify-content:space-between;
      align-items:flex-start;
      gap:12px;
      margin-bottom:16px;
    }

    .title{
      margin:0;
      font-size:20px;
      font-weight:900;
    }

    .subtitle{
      margin:6px 0 0;
      font-size:12.5px;
      color:var(--text-muted);
      line-height:1.45;
    }

    .logout{
      padding:10px 14px;
      border-radius:999px;
      border:1px solid var(--border-soft);
      background:rgba(0,0,0,.15);
      color:var(--text-main);
      cursor:pointer;
      font-size:12.5px;
      font-weight:700;
    }

    /* GRID MOBILE */
    .menu{
      display:grid;
      grid-template-columns:repeat(2,1fr);
      gap:12px;
      margin-top:14px;
    }

    @media(max-width:360px){
      .menu{grid-template-columns:1fr;}
    }

    .card{
      border-radius:18px;
      border:1px solid var(--border-soft);
      background:linear-gradient(180deg,rgba(20,20,39,.96),rgba(14,14,26,.96));
      box-shadow:var(--shadow);
      padding:14px;
      cursor:pointer;
      min-height:150px;

      display:flex;
      flex-direction:column;
      gap:10px;
      transition:transform .18s ease, border-color .18s ease;
    }

    .card:active{ transform:scale(.99); }

    .icon-box{
      width:52px;
      height:52px;
      border-radius:16px;
      display:flex;
      align-items:center;
      justify-content:center;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
      color:#140615;
      font-weight:900;
      font-size:22px;
      box-shadow:0 14px 34px rgba(0,0,0,.35);
    }

    .card h3{
      margin:0;
      font-size:14.5px;
      font-weight:900;
      line-height:1.25;
    }

    .card p{
      margin:0;
      font-size:12.2px;
      color:var(--text-muted);
      line-height:1.45;
    }

    /* ===== CARD TERAKHIR DI TENGAH ===== */
    .card-center{
      grid-column:1 / -1;       /* span 2 kolom */
      align-items:center;
      text-align:center;
    }

    .card-center .icon-box{
      margin-bottom:4px;
    }

    .footer{
      margin-top:18px;
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
          Pilih fitur untuk pemantauan perilaku anak berbasis wearable & AI.
        </p>
      </div>
      <button class="logout">Keluar</button>
    </div>

    <!-- MENU -->
    <div class="menu">

      <div class="card" onclick="location.href='riwayat-tantrum.html'">
        <div class="icon-box">📊</div>
        <h3>Riwayat Tantrum</h3>
        <p>Rekaman kronologis kejadian untuk evaluasi jangka panjang.</p>
      </div>

      <div class="card" onclick="location.href='rekomendasi-penanganan.html'">
        <div class="icon-box">🧠</div>
        <h3>Rekomendasi Penanganan</h3>
        <p>Saran intervensi berbasis pola data dan kondisi terkini anak.</p>
      </div>

      <div class="card" onclick="location.href='laporan-bulanan.html'">
        <div class="icon-box">📅</div>
        <h3>Laporan Bulanan</h3>
        <p>Ringkasan tren perilaku dan fisiologis untuk keputusan.</p>
      </div>

      <div class="card" onclick="location.href='notifikasi-realtime.html'">
        <div class="icon-box">⚠️</div>
        <h3>Notifikasi Realtime</h3>
        <p>Peringatan dini saat terdeteksi potensi tantrum.</p>
      </div>

      <!-- CARD TENGAH -->
      <div class="card card-center" onclick="location.href='connect-wearable.html'">
        <div class="icon-box">⌚</div>
        <h3>Connect Wearable</h3>
        <p>Menghubungkan aplikasi dengan wearable device untuk pemantauan real-time.</p>
      </div>

    </div>

    <div class="footer">© 2026 DEKAP</div>
  </div>
</body>
</html>
