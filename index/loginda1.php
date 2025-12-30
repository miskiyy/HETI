<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>DEKAP | Login</title>

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
      display:flex;
      align-items:center;
      justify-content:center;
      padding:24px;
      font-family:system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      color:var(--text-main);
      background:
        radial-gradient(900px 520px at 18% 12%, rgba(91,30,93,.48), transparent 62%),
        radial-gradient(900px 520px at 82% 88%, rgba(242,163,27,.35), transparent 62%),
        linear-gradient(180deg,#0B0B10,#0E0E1A);
    }

    .login-box{
      width:min(420px,100%);
      padding:26px 22px 18px;
      border-radius:var(--radius);
      border:1px solid var(--border-soft);
      box-shadow:var(--shadow);
      background:linear-gradient(180deg,rgba(20,20,39,.96),rgba(14,14,26,.96));
      backdrop-filter:blur(10px);
    }

    .brand{
      display:flex;
      align-items:center;
      gap:14px;
      margin-bottom:14px;
    }

    .logo-img{
      width:54px;
      height:54px;
      border-radius:14px;
      object-fit:contain;
      background:#0B0B10;
      padding:6px;
      box-shadow:0 10px 30px rgba(0,0,0,.35);
    }

    .title{
      margin:0;
      font-size:18px;
      font-weight:800;
    }

    .subtitle{
      margin:2px 0 0;
      font-size:12.5px;
      color:var(--text-muted);
    }

    .divider{
      height:1px;
      background:rgba(255,255,255,.08);
      margin:14px 0;
    }

    label{
      display:block;
      font-size:12px;
      color:var(--text-muted);
      margin:10px 0 6px;
    }

    input,select{
      width:100%;
      padding:12px;
      border-radius:14px;
      border:1px solid rgba(255,255,255,.12);
      background:#0B0B10;
      color:var(--text-main);
      outline:none;
    }

    input:focus,select:focus{
      border-color:var(--accent);
      box-shadow:0 0 0 4px rgba(242,163,27,.18);
    }

    .row{
      display:grid;
      grid-template-columns:1fr 1fr;
      gap:10px;
    }

    @media(max-width:520px){
      .row{grid-template-columns:1fr}
    }

    .toggle{
      display:flex;
      justify-content:space-between;
      align-items:center;
      margin-top:10px;
      font-size:12px;
      color:var(--text-muted);
    }

    .toggle a{
      color:#fff;
      text-decoration:none;
    }

    .login-btn{
      width:100%;
      margin-top:14px;
      padding:12px;
      border:none;
      border-radius:14px;
      cursor:pointer;
      font-weight:900;
      color:#140615;
      background:linear-gradient(135deg,var(--primary),var(--secondary),var(--accent));
    }

    .footer{
      margin-top:14px;
      text-align:center;
      font-size:11.5px;
      color:rgba(184,175,199,.85);
    }
  </style>
</head>

<body>

  <div class="login-box">
    <div class="brand">
      <!-- GANTI LOGO DI SINI -->
      <img src="logo-dekap.png" alt="Logo DEKAP" class="logo-img">

      <div>
        <p class="title">DEKAP</p>
        <p class="subtitle">Sistem Wearable & AI Multimodal</p>
      </div>
    </div>

    <div class="divider"></div>

    <form>
      <div class="row">
        <div>
          <label>Peran</label>
          <select>
            <option>User</option>
            <option>Admin</option>
          </select>
        </div>
        <div>
          <label>Instansi</label>
          <input type="text" placeholder="SLB / Sekolah">
        </div>
      </div>

      <label>Email</label>
      <input type="email" placeholder="nama@email.com" required>

      <label>Kata Sandi</label>
      <input type="password" placeholder="••••••••" required>

      <div class="toggle">
        <label><input type="checkbox"> Ingat saya</label>
        <a href="#">Lupa sandi?</a>
      </div>

      <button class="login-btn">Masuk</button>
    </form>

    <div class="footer">© 2026 DEKAP</div>
  </div>

</body>
</html>
