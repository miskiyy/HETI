<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DEKAP | Rekomendasi Penanganan</title>

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
      --success:#3BD671;
      --warning:#F2A31B;
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
      margin-bottom:20px;
    }

    .title{
      margin:0;
      font-size:22px;
      font-weight:800;
    }

    .subtitle{
      margin:6px 0 0;
      font-size:13px;
      color:var(--text-muted);
    }

    .summary{
      margin-top:18px;
      padding:18px;
      border-radius:var(--radius);
      border:1px solid var(--border-soft);
      background:linear-gradient(180deg,rgba(20,20,39,.96),rgba(14,14,26,.96));
      box-shadow:var(--shadow);
      display:grid;
      grid-template-columns:1fr 1fr 1fr;
      gap:16px;
    }

    @media(max-width:768px){
      .summary{
        grid-template-columns:1fr;
      }
    }

    .stat{
      text-align:center;
    }

    .stat h3{
      margin:0;
      font-size:20px;
      font-weight:900;
      color:var(--accent);
    }

    .stat p{
      margin:4px 0 0;
      font-size:12.5px;
      color:var(--text-muted);
    }

    .list{
      margin-top:22px;
      display:flex;
      flex-direction:column;
      gap:16px;
    }

    .card{
      padding:20px;
      border-radius:var(--radius);
      border:1px solid var(--border-soft);
      background:linear-gradient(180deg,rgba(20,20,39,.96),rgba(14,14,26,.96));
      box-shadow:var(--shadow);
    }

    .card h4{
      margin:0 0 8px;
      font-size:16px;
      font-weight:800;
      display:flex;
      align-items:center;
      gap:8px;
    }

    .card p{
      margin:0 0 12px;
      font-size:13.5px;
      color:var(--text-muted);
      line-height:1.5;
    }

    .tag{
      display:inline-block;
      padding:6px 10px;
      border-radius:12px;
      font-size:11.5px;
      font-weight:700;
      background:rgba(59,214,113,.18);
      color:var(--success);
      margin-right:6px;
    }

    .tag.warning{
      background:rgba(242,163,27,.18);
      color:var(--warning);
    }

    .action{
      margin-top:10px;
      display:flex;
      gap:10px;
      flex-wrap:wrap;
    }

    .btn{
      padding:10px 14px;
      border-radius:14px;
      border:none;
      cursor:pointer;
      font-size:12.5px;
      font-weight:800;
      color:#140615;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
    }

    .btn.secondary{
      background:transparent;
      color:var(--text-main);
      border:1px solid var(--border-soft);
      font-weight:600;
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
      <p class="title">Rekomendasi Penanganan</p>
      <p class="subtitle">
        Saran intervensi berbasis analisis pola data wearable dan kondisi terkini anak
      </p>
    </div>

    <!-- RINGKASAN KONDISI -->
    <div class="summary">
      <div class="stat">
        <h3>Tinggi</h3>
        <p>Risiko Tantrum Saat Ini</p>
      </div>
      <div class="stat">
        <h3>Bising</h3>
        <p>Pemicu Dominan</p>
      </div>
      <div class="stat">
        <h3>GSR ↑</h3>
        <p>Indikator Fisiologis</p>
      </div>
    </div>

    <!-- DAFTAR REKOMENDASI -->
    <div class="list">

      <div class="card">
        <h4>🟢 Intervensi Segera</h4>
        <p>
          Ajak anak ke lingkungan yang lebih tenang dan minim stimulasi suara
          selama 5–10 menit untuk menurunkan tingkat stres.
        </p>
        <span class="tag">Prioritas Tinggi</span>
        <span class="tag warning">Lingkungan</span>
        <div class="action">
          <button class="btn">Tandai Dilakukan</button>
          <button class="btn secondary">Lihat Detail</button>
        </div>
      </div>

      <div class="card">
        <h4>🟡 Pendekatan Sensorik</h4>
        <p>
          Berikan tekanan dalam (deep pressure) atau aktivitas sensorik ringan
          untuk membantu regulasi emosi anak.
        </p>
        <span class="tag">Direkomendasikan</span>
        <span class="tag warning">Sensorik</span>
        <div class="action">
          <button class="btn">Tandai Dilakukan</button>
          <button class="btn secondary">Lihat Detail</button>
        </div>
      </div>

      <div class="card">
        <h4>🔵 Pencegahan Jangka Pendek</h4>
        <p>
          Berdasarkan pola data sebelumnya, lakukan jeda aktivitas setiap
          30–40 menit untuk mencegah eskalasi perilaku.
        </p>
        <span class="tag">Pencegahan</span>
        <span class="tag warning">Pola Data</span>
        <div class="action">
          <button class="btn">Tandai Dilakukan</button>
          <button class="btn secondary">Lihat Detail</button>
        </div>
      </div>

    </div>

    <div class="footer">© 2026 DEKAP — Rekomendasi bersifat pendukung, bukan diagnosis medis</div>

  </div>

</body>
</html>
