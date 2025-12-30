<?php
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $metode = $_POST['metode'] ?? '';
    $jenis = $_POST['jenis'] ?? '';
    $link = $_POST['link'] ?? '';

    if ($metode && $jenis && $link) {
        $conn = new mysqli("localhost", "procapital", "71im4b65", "procapital");
        if ($conn->connect_error) {
            $error = "Koneksi database gagal!";
        } else {
            $stmt = $conn->prepare("INSERT INTO pembayaran (metode, jenis, link) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $metode, $jenis, $link);
            if ($stmt->execute()) {
                $success = "✅ Terima kasih atas pembayaran Anda!";
            } else {
                $error = "Gagal menyimpan ke database.";
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        $error = "Semua kolom wajib diisi!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pembayaran Nova Capital</title>
    <style>
        body {
            background-color: #0d1117;
            font-family: Arial, sans-serif;
            color: #fff;
            padding: 40px;
            display: flex;
            justify-content: center;
        }

        .container {
            background-color: #1f1f1f;
            padding: 30px;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
        }

        h1 {
            color: #4ea8ff;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            border: none;
            margin-top: 5px;
            border-radius: 6px;
            background-color: #2a2a2a;
            color: #fff;
        }

        .btn {
            background-color: #22c55e;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 20px;
            background-color: #3b82f6;
            padding: 10px;
            border-radius: 8px;
            text-decoration: none;
            color: white;
        }

        .message {
            margin-top: 15px;
            font-weight: bold;
            color: #22c55e;
            text-align: center;
        }

        .error {
            color: #f87171;
            text-align: center;
            margin-top: 15px;
        }
    </style>

    <script>
        function updateJenis() {
            const metode = document.getElementById("metode").value;
            const jenis = document.getElementById("jenis");

            jenis.innerHTML = "";

            if (metode === "E-Wallet") {
                ["OVO", "DANA", "GoPay"].forEach(val => {
                    const opt = document.createElement("option");
                    opt.value = val;
                    opt.innerText = val;
                    jenis.appendChild(opt);
                });
            } else if (metode === "Rekening") {
                ["BCA", "BRI", "Mandiri"].forEach(val => {
                    const opt = document.createElement("option");
                    opt.value = val;
                    opt.innerText = val;
                    jenis.appendChild(opt);
                });
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Pembayaran Nova Capital</h1>
        <p>Silakan pilih metode pembayaran Anda dan unggah link bukti pembayaran dari Google Drive.</p>

        <?php if ($success): ?>
            <div class="message"><?= $success ?></div>
        <?php elseif ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <label for="metode">Pilih Metode:</label>
            <select id="metode" name="metode" onchange="updateJenis()" required>
                <option value="">-- Pilih --</option>
                <option value="E-Wallet">E-Wallet</option>
                <option value="Rekening">Rekening</option>
            </select>

            <label for="jenis">Pilih Jenis:</label>
            <select id="jenis" name="jenis" required>
                <!-- Diisi otomatis lewat JavaScript -->
            </select>

            <label for="link">Upload Link Pembayaran (Google Drive):</label>
            <input type="text" name="link" placeholder="https://drive.google.com/..." required>

            <button class="btn" type="submit">Kirim Bukti</button>
        </form>

        <a class="btn-back" href="https://sites.its.ac.id/inovasidigital/procapital/index/dashboard.php">
            ← Kembali ke Dashboard
        </a>
    </div>
</body>
</html>
