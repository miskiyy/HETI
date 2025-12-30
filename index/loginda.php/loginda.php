<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DEKAP | Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    body{
      margin:0;
      height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      background:#0b1220;
      font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
      color:#eaf1ff;
    }

    .login-box{
      width:360px;
      padding:28px;
      border-radius:16px;
      background:#0f1a33;
      box-shadow:0 20px 50px rgba(0,0,0,.4);
    }

    .logo{
      text-align:center;
      font-size:26px;
      font-weight:800;
      letter-spacing:1px;
      margin-bottom:6px;
    }

    .subtitle{
      text-align:center;
      font-size:13px;
      color:#9bb0d1;
      margin-bottom:22px;
    }

    label{
      font-size:12px;
      color:#9bb0d1;
      display:block;
      margin-bottom:6px;
    }

    input, select{
      width:100%;
      padding:11px 12px;
      margin-bottom:14px;
      border-radius:12px;
      border:1px solid rgba(255,255,255,.15);
      background:#0b1220;
      color:#eaf1ff;
      outline:none;
    }

    input:focus, select:focus{
      border-color:#4f8cff;
      box-shadow:0 0 0 3px rgba(79,140,255,.2);
    }

    .login-btn{
      width:100%;
      padding:12px;
      border:none;
      border-radius:12px;
      background:linear-gradient(135deg,#4f8cff,#35d0ba);
      color:#061028;
      font-weight:800;
      cursor:pointer;
      margin-top:8px;
    }

    .login-btn:hover{
      filter:brightness(1.05);
    }

    .footer{
      margin-top:14px;
      text-align:center;
      font-size:12px;
      color:#9bb0d1;
    }

    .footer a{
      color:#cfe0ff;
      text-decoration:none;
    }
  </style>
</head>

<body>

  <div class="login-box">
    <div class="logo">DEKAP</div>
    <div class="subtitle">Sistem Wearable & AI Multimodal</div>

    <form>
      <label for="role">Peran</label>
      <select id="role" name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="nama@email.com" required>

      <label for="password">Kata Sandi</label>
      <input type="password" id="password" name="password" placeholder="••••••••" required>

      <button type="submit" class="login-btn">Masuk</button>
    </form>

    <div class="footer">
      © 2026 DEKAP
    </div>
  </div>

</body>
</html>
