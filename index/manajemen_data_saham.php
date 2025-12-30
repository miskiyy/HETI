<?php
$koneksi = new mysqli("localhost", "procapital", "71im4b65", "procapital");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// CSV Import
if (isset($_POST['import']) && isset($_FILES['csv_file']['tmp_name'])) {
    $csv = fopen($_FILES['csv_file']['tmp_name'], 'r');
    fgetcsv($csv); // skip header
    while ($row = fgetcsv($csv)) {
        $nama = $koneksi->real_escape_string($row[0]);
        $harga = (int) str_replace('.', '', $row[1]);
        $koneksi->query("INSERT INTO data_saham(nama_emiten, harga_emiten) VALUES('$nama', $harga)");
    }
    fclose($csv);
    header("Location: manajemen_data_saham.php");
    exit;
}

// CSV Export
if (isset($_POST['export'])) {
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=data_saham.csv");
    $out = fopen("php://output", "w");
    fputcsv($out, ['Nama Emiten', 'Harga Emiten (Rp)']);
    $result = $koneksi->query("SELECT * FROM data_saham ORDER BY nama_emiten ASC");
    while ($row = $result->fetch_assoc()) {
        fputcsv($out, [$row['nama_emiten'], number_format($row['harga_emiten'], 0, ',', '.')]);
    }
    fclose($out);
    exit;
}

// Ambil data saham
$data = $koneksi->query("SELECT * FROM data_saham ORDER BY nama_emiten ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Data Saham</title>
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        h1 {
            text-align: center;
            color: #4ea8ff;
        }
        form {
            display: inline-block;
            margin: 10px;
        }
        input[type="file"] {
            padding: 6px;
            border-radius: 4px;
        }
        button {
            padding: 8px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            margin-left: 5px;
        }
        .import { background-color: #22c55e; color: white; }
        .export { background-color: #3b82f6; color: white; }
        table {
            margin-top: 30px;
            width: 100%;
            border-collapse: collapse;
            background: #222;
        }
        th, td {
            border: 1px solid #444;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #333;
        }
        tr:hover {
            background-color: #2a2a2a;
        }
        .no-data {
            text-align: center;
            color: #f87171;
            font-style: italic;
        }
        .btn-back {
            display: block;
            margin: 30px auto 0;
            padding: 10px 20px;
            background-color: #4ea8ff;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            text-align: center;
            font-weight: bold;
            width: fit-content;
        }
        .btn-back:hover {
            background-color: #2196f3;
        }
    </style>
</head>
<body>
    <h1>Manajemen Data Saham</h1>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="csv_file" required>
        <button class="import" name="import">Import CSV</button>
    </form>

    <form method="post">
        <button class="export" name="export">Export CSV</button>
    </form>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Emiten</th>
            <th>Harga Emiten (Rp)</th>
        </tr>
        <?php
        if ($data && $data->num_rows > 0) {
            $no = 1;
            while ($row = $data->fetch_assoc()) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama_emiten']}</td>
                        <td>" . number_format($row['harga_emiten'], 0, ',', '.') . "</td>
                    </tr>";
                $no++;
            }
        } else {
            echo "<tr><td colspan='3' class='no-data'>Belum ada data.</td></tr>";
        }
        ?>
    </table>

    <a class="btn-back" href="https://sites.its.ac.id/inovasidigital/procapital/index/dashboard.php">← Kembali ke Dashboard</a>
</body>
</html>
