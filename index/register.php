<?php
session_start();
require 'config.php';

$error = "";
$success = "";

// Jika user sudah login, langsung redirect
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    // Validasi input
    if (!$name || !$email || !$password || !$confirm) {
        $error = "❌ Semua bidang wajib diisi.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "❌ Email tidak valid.";
    } elseif ($password !== $confirm) {
        $error = "❌ Konfirmasi password tidak cocok.";
    } else {
        // Cek jika email sudah terdaftar
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        if (!$stmt) {
            $error = "❌ Terjadi kesalahan server, silakan coba lagi.";
        } else {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $error = "❌ Email sudah terdaftar.";
            } else {
                // Hash password dan simpan
                $hashed = password_hash($password, PASSWORD_DEFAULT);
                $role = 'user';

                $insert = $conn->prepare(
                    "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)"
                );
                if (!$insert) {
                    $error = "❌ Terjadi kesalahan server, silakan coba lagi.";
                } else {
                    $insert->bind_param("ssss", $name, $email, $hashed, $role);
                    if ($insert->execute()) {
                        $success = "✅ Registrasi berhasil! Silakan <a href='login.php' style='color: var(--success-text); text-decoration: underline;'>Login di sini</a>.";
                    } else {
                        $error = "❌ Terjadi kesalahan saat menyimpan data.";
                    }
                    $insert->close();
                }
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar - Procpital</title>
  <style>
    /* Dark mode palette variables */
    :root {
      --bg: #141414;
      --surface: #282828;
      --card: #3c3c3c;
      --primary: #3c3c50;
      --secondary: #28283c;
      --accent: #282814;
      --text: #e0e0e0;
      --success-bg: #3c3c50;
      --success-text: #a8ff60;
      --error-bg: #3c3c50;
      --error-text: #ff6b6b;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: Arial, sans-serif;
      background-color: var(--bg);
      color: var(--text);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .register-container {
      background: var(--card);
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.5);
      width: 100%;
      max-width: 380px;
    }
    h2 {
      margin-bottom: 1.5rem;
      text-align: center;
      color: var(--text);
      font-weight: 600;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: 1px solid var(--surface);
      border-radius: 6px;
      background: var(--surface);
      color: var(--text);
      font-size: 0.95rem;
      transition: border-color 0.2s;
    }
    input::placeholder { color: #999; }
    input:focus { outline: none; border-color: var(--primary); }
    .btn-register,
    .btn-login {
      display: block;
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: none;
      border-radius: 6px;
      color: white;
      font-size: 1rem;
      cursor: pointer;
      text-align: center;
      text-decoration: none;
      transition: filter 0.2s;
    }
    .btn-register { background-color: var(--primary); }
    .btn-register:hover { filter: brightness(1.1); }
    .btn-login { background-color: var(--secondary); }
    .btn-login:hover { filter: brightness(1.1); }
    .error, .success {
      padding: 0.6rem 1rem;
      border-radius: 6px;
      margin-bottom: 1rem;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
    }
    .error { background: var(--error-bg); color: var(--error-text); }
    .error::before { content: '⚠️'; margin-right: 0.5rem; }
    .success { background: var(--success-bg); color: var(--success-text); }
    .success::before { content: '✅'; margin-right: 0.5rem; }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Daftar Akun Procpital</h2>

    <?php if ($error): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php elseif ($success): ?>
      <div class="success"><?= $success ?></div>
    <?php endif; ?>

    <?php if (!$success): ?>
    <form method="POST" action="">
      <input type="text" name="name" placeholder="Nama Lengkap" required />
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required />
      <button type="submit" class="btn-register">Daftar</button>
    </form>
    <a href="login.php" class="btn-login">Sudah punya akun? Login</a>
    <?php endif; ?>
  </div>
</body>
</html>