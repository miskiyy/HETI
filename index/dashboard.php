<?php
session_start();

// Cek kalau belum login, redirect ke login page
if (!isset($_SESSION['email'])) {
  header("Location: https://sites.its.ac.id/inovasidigital/procapital/index/login.php");
  exit();
}

// Ambil email dari session
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Nova Capital Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #121212;
      color: #f1f1f1;
      margin: 0;
      padding: 0;
    }
    header {
      background: #1e1e1e;
      padding: 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 {
      margin: 0;
      font-size: 20px;
    }
    .emoji {
      font-size: 24px;
      margin-right: 10px;
    }
    .logout {
      background: #ff4c4c;
      color: #fff;
      border: none;
      padding: 10px 16px;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }
    .container {
      max-width: 900px;
      margin: 40px auto;
      padding: 0 20px;
    }
    .welcome {
      font-size: 18px;
      margin-bottom: 30px;
    }
    .welcome strong {
      color: #00bfff;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
    }
    .feature {
      background: #1e1e1e;
      padding: 30px 20px;
      text-align: center;
      border-radius: 10px;
      text-decoration: none;
      color: #f1f1f1;
      transition: background 0.3s;
    }
    .feature:hover {
      background: #2a2a2a;
    }
    .feature-title {
      font-weight: bold;
      margin-bottom: 10px;
    }
    .feature-desc {
      font-size: 14px;
      color: #aaa;
    }
  </style>
</head>
<body>

  <header>
    <h1><span class="emoji">📈</span>Nova Capital</h1>
    <a href="https://sites.its.ac.id/inovasidigital/procapital/index/logout.php" class="logout">Logout</a>
  </header>

  <div class="container">
    <div class="welcome">Hai, Selamat Datang <strong><?php echo htmlspecialchars($email); ?></strong></div>

    <div class="grid">
      <a href="https://sites.its.ac.id/inovasidigital/procapital/index/teknikal.php" class="feature">
        <div class="feature-title">Analisis Teknikal</div>
        <div class="feature-desc">Prediksi harga dengan pola grafik & indikator teknikal.</div>
      </a>
      <a href="https://sites.its.ac.id/inovasidigital/procapital/index/fundamental.php" class="feature">
        <div class="feature-title">Analisis Fundamental</div>
        <div class="feature-desc">Evaluasi kesehatan & nilai wajar perusahaan.</div>
      </a>
      <a href="https://sites.its.ac.id/inovasidigital/procapital/index/bandar.php" class="feature">
        <div class="feature-title">Analisis Bandar</div>
        <div class="feature-desc">Deteksi akumulasi & distribusi pemain besar.</div>
      </a>
      <a href="https://sites.its.ac.id/inovasidigital/procapital/index/money_management.php" class="feature">
        <div class="feature-title">Money Management</div>
        <div class="feature-desc">Atur alokasi modal & mitigasi risiko transaksi.</div>
      </a>
      <a href="https://sites.its.ac.id/inovasidigital/procapital/index/chatboot.php" class="feature">
        <div class="feature-title">Chatbot Interaktif</div>
        <div class="feature-desc">Tanya jawab cepat seputar strategi & saham.</div>
      </a>
      <a href="https://sites.its.ac.id/inovasidigital/procapital/index/konten-edukasi.php" class="feature">
        <div class="feature-title">Konten Edukasi</div>
        <div class="feature-desc">Materi belajar saham praktis & terarah.</div>
      </a>
    </div>
  </div>

</body>
</html>
