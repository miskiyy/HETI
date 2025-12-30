<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DEKAP | Hubungkan Wearable</title>

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
      --danger:#FF6A6A;
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
      display:flex;
      align-items:center;
      justify-content:center;
    }

    .box{
      width:min(420px,100%);
      padding:24px;
      border-radius:var(--radius);
      border:1px solid var(--border-soft);
      background:linear-gradient(180deg,rgba(20,20,39,.96),rgba(14,14,26,.96));
      box-shadow:var(--shadow);
      text-align:center;
    }

    .icon{
      width:70px;
      height:70px;
      margin:0 auto 14px;
      border-radius:18px;
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:30px;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
      color:#140615;
      font-weight:900;
    }

    h2{
      margin:0 0 6px;
      font-size:20px;
      font-weight:800;
    }

    p{
      margin:0 0 18px;
      font-size:13.5px;
      color:var(--text-muted);
      line-height:1.5;
    }

    .status{
      display:flex;
      align-items:center;
      justify-content:center;
      gap:8px;
      margin-bottom:18px;
      font-size:13px;
      color:var(--text-muted);
    }

    .dot{
      width:10px;
      height:10px;
      border-radius:50%;
      background:var(--danger);
    }

    .dot.connected{
      background:var(--success);
    }

    .btn{
      width:100%;
      padding:14px;
      border:none;
      border-radius:14px;
      cursor:pointer;
      font-weight:900;
      color:#140615;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
      margin-bottom:10px;
    }

    .btn.secondary{
      background:transparent;
      color:var(--text-main);
      border:1px solid var(--border-soft);
      font-weight:600;
    }

    .device{
      margin-top:16px;
      padding:12px;
      border-radius:14px;
      border:1px dashed rgba(255,255,255,.18);
      font-size:12.5px;
      color:var(--text-muted);
      display:none;
    }

    .footer{
      margin-top:16px;
      font-size:11.5px;
      color:rgba(184,175,199,.85);
    }
  </style>
</head>

<body>

  <div class="box">

    <div class="icon">⌚</div>

    <h2>Hubungkan Wearable DEKAP</h2>
    <p>
      Sambungkan perangkat wearable untuk memulai pemantauan
      perilaku dan kondisi fisiologis secara real-time.
    </p>

    <div class="status">
      <span class="dot" id="statusDot"></span>
      <span id="statusText">Belum terhubung</span>
    </div>

    <button class="btn" onclick="connectDevice()">Hubungkan Wearable</button>
    <button class="btn secondary" onclick="disconnectDevice()">Putuskan Koneksi</button>

    <div class="device" id="deviceBox">
      Perangkat terdeteksi: <strong>DEKAP-WEAR-01</strong><br>
      Status: Terhubung
    </div>

    <div class="footer">Pastikan Bluetooth aktif pada perangkat Anda</div>

  </div>

  <script>
    function connectDevice(){
      document.getElementById("statusText").innerText = "Menghubungkan...";
      setTimeout(() => {
        document.getElementById("statusText").innerText = "Terhubung";
        document.getElementById("statusDot").classList.add("connected");
        document.getElementById("deviceBox").style.display = "block";
      }, 1500);
    }

    function disconnectDevice(){
      document.getElementById("statusText").innerText = "Belum terhubung";
      document.getElementById("statusDot").classList.remove("connected");
      document.getElementById("deviceBox").style.display = "none";
    }
  </script>

</body>
</html>
