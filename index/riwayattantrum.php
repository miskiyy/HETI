<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DEKAP | Riwayat Tantrum</title>

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
      --danger:#FF6A6A;
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
      display:flex;
      align-items:center;
      justify-content:space-between;
      margin-bottom:20px;
    }

    .title{
      margin:0;
      font-size:22px;
      font-weight:800;
    }

    .subtitle{
      margin:4px 0 0;
      font-size:13px;
      color:var(--text-muted);
    }

    .filter{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
    }

    select,input{
      padding:10px 12px;
      border-radius:14px;
      border:1px solid var(--border-soft);
      background:#0B0B10;
      color:var(--text-main);
    }

    .list{
      margin-top:20px;
      display:flex;
      flex-direction:column;
      gap:14px;
    }

    .item{
      padding:18px;
      border-radius:var(--radius);
      border:1px solid var(--border-soft);
      background:linear-gradient(180deg,rgba(20,20,39,.96),rgba(14,14,26,.96));
      box-shadow:var(--shadow);
      display:grid;
      grid-template-columns:140px 1fr 120px;
      gap:16px;
      align-items:center;
    }

    @media(max-width:768px){
      .item{
        grid-template-columns:1fr;
      }
    }

    .date{
      font-size:13px;
      color:var(--text-muted);
    }

    .detail h4{
      margin:0 0 6px;
      font-size:15.5px;
      font-weight:800;
    }

    .detail p{
      margin:0;
      font-size:13px;
      color:var(--text-muted);
      line-height:1.5;
    }

    .badge{
      padding:8px 12px;
      border-radius:12px;
      font-size:12px;
      font-weight:700;
      text-align:center;
      background:rgba(255,106,106,.15);
      color:var(--danger);
    }

    .badge.medium{
      background:rgba(242,163,27,.18);
      color:var(--warning);
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
        <p class="title">Riwayat Tantrum</p>
        <p class="subtitle">
          Rekaman kejadian tantrum anak yang disusun secara kronologis
          untuk evaluasi jangka panjang
        </p>
      </div>

      <div class="filter">
        <input type="date">
        <select>
          <option>Semua Tingkat</option>
          <option>Ringan</option>
          <option>Sedang</option>
          <option>Berat</option>
        </select>
      </div>
    </div>

    <!-- LIST RIWAYAT -->
    <div class="list">

      <div class="item">
        <div class="date">
          12 Feb 2026<br>09:14 WIB
        </div>
        <div class="detail">
          <h4>Tantrum Intensitas Tinggi</h4>
          <p>
            Peningkatan GSR dan gerakan agresif terdeteksi selama 3 menit.
            Lingkungan bising teridentifikasi sebagai pemicu.
          </p>
        </div>
        <div class="badge">Berat</div>
      </div>

      <div class="item">
        <div class="date">
          10 Feb 2026<br>13:02 WIB
        </div>
        <div class="detail">
          <h4>Tantrum Intensitas Sedang</h4>
          <p>
            Deteksi peningkatan gerakan berulang dan vokalisasi tinggi.
            Anak berhasil ditenangkan setelah intervensi awal.
          </p>
        </div>
        <div class="badge medium">Sedang</div>
      </div>

      <div class="item">
        <div class="date">
          07 Feb 2026<br>10:45 WIB
        </div>
        <div class="detail">
          <h4>Tantrum Intensitas Ringan</h4>
          <p>
            Perubahan fisiologis ringan terdeteksi tanpa eskalasi lanjutan.
            Tidak diperlukan intervensi khusus.
          </p>
        </div>
        <div class="badge medium">Ringan</div>
      </div>

    </div>

    <div class="footer">© 2026 DEKAP — Data disajikan untuk keperluan pemantauan</div>

  </div>

</body>
</html>
