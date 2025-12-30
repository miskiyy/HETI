<?php
// Lokasi folder untuk menyimpan file upload
$upload_dir = __DIR__ . '/uploads/';

// Buat folder jika belum ada
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Inisialisasi variabel
$content = '';
$summary = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['document']) && $_FILES['document']['error'] === UPLOAD_ERR_OK) {
        $filename = basename($_FILES['document']['name']);
        $target_file = $upload_dir . $filename;

        if (move_uploaded_file($_FILES['document']['tmp_name'], $target_file)) {
            $content = file_get_contents($target_file);
            
            // Ringkasan sederhana: ambil 3 kalimat pertama
            $sentences = preg_split('/(?<=[.?!])\s+/', $content);
            $summary = implode(' ', array_slice($sentences, 0, 3));
        } else {
            $error = "Gagal mengunggah file.";
        }
    } else {
        $error = "Tidak ada file yang diunggah atau terjadi kesalahan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Baca Laporan Keuangan</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #0f0f0f;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 40px;
        }
        .container {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 10px;
            width: 80%;
            max-width: 700px;
            box-shadow: 0 0 20px rgba(0,0,0,0.6);
        }
        h1 {
            color: #4ea8ff;
            text-align: center;
        }
        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        input[type="file"] {
            background-color: #000;
            color: #fff;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
        }
        .btn-submit {
            background-color: #22c55e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }
        .btn-back {
            margin-top: 20px;
            display: inline-block;
            text-align: center;
            background-color: #3b82f6;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
        }
        .result {
            margin-top: 30px;
            background-color: #2a2a2a;
            padding: 20px;
            border-radius: 8px;
        }
        .error {
            color: #f87171;
            text-align: center;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Baca Laporan Keuangan</h1>
        <p style="text-align:center; color:#ccc;">Unggah dokumen laporan keuangan Anda dalam format <strong>.txt</strong>. Sistem akan memindai dan menampilkan isinya secara otomatis.</p>

        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="document" accept=".txt" required>
            <button class="btn-submit" type="submit">Scan & Tampilkan</button>
        </form>

        <?php if ($content): ?>
            <div class="result">
                <h3>📄 Isi Dokumen:</h3>
                <pre><?= htmlspecialchars($content) ?></pre>

                <h3>🧠 Ringkasan Otomatis:</h3>
                <p><?= htmlspecialchars($summary) ?></p>
            </div>
        <?php endif; ?>

        <a class="btn-back" href="https://sites.its.ac.id/inovasidigital/procapital/index/dashboard.php">&larr; Kembali ke Dashboard</a>
    </div>
</body>
</html>
