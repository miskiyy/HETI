<?php
session_start();
require 'config.php';
require_once 'vendor/autoload.php'; // Google API Client

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Jika user sudah login, langsung redirect
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

// Setup Google OAuth
$client = new Google_Client();
$client->setClientId('248245173922-takkqj8cajqveq0v1puvpbgn08ebf2ej.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://sites.its.ac.id/inovasidigital/procapital/index/login-callback.php');
$client->addScope('email');
$client->addScope('profile');

// Buat URL otorisasi
$authUrl = $client->createAuthUrl();

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
        $error = "❌ Permintaan tidak valid.";
    } else {
        $email = trim($_POST['email']);
        $password = $_POST['password'] ?? '';

        $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 1) {
            $stmt->bind_result($id, $hashed_password, $role);
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $id;
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "❌ Password salah.";
            }
        } else {
            $error = "❌ Email tidak ditemukan.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Nova Capital</title>
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
    .login-container {
      background: var(--card);
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
      width: 100%; max-width: 380px;
    }
    h2 {
      margin-bottom: 1.5rem;
      text-align: center;
      color: var(--text);
      font-weight: 600;
    }
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
    .btn-login,
    .btn-register,
    .btn-google {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;
      padding: 0.75rem;
      margin-bottom: 1rem;
      border: none;
      border-radius: 6px;
      color: white;
      font-size: 1rem;
      cursor: pointer;
      text-decoration: none;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .btn-login { background-color: var(--primary); }
    .btn-register { background-color: var(--secondary); }
    .btn-google { background-color: var(--accent); }
    .btn-login:hover,
    .btn-register:hover,
    .btn-google:hover {
      transform: translateY(-2px) scale(1.02);
      box-shadow: 0 8px 20px rgba(60, 60, 80, 0.4);
    }
    .btn-google img {
      width: 18px;
      height: 18px;
      margin-right: 8px;
    }
    .error {
      background: var(--error-bg);
      color: var(--error-text);
      padding: 0.6rem 1rem;
      border-radius: 6px;
      margin-bottom: 1rem;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
    }
    .error::before { content: '⚠️'; margin-right: 0.5rem; }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login ke Nova Capital</h2>

    <?php if (!empty($error)): ?>
      <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" class="btn-login">Login</button>
    </form>
    <a href="register.php" class="btn-register">Daftar</a>
    <a href="<?php echo htmlspecialchars($authUrl); ?>" class="btn-google">
      <img src="https://www.gstatic.com/images/branding/product/1x/googleg_32dp.png" alt="Google logo">
      Login dengan Google
    </a>
  </div>
</body>
</html>