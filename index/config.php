<?php
$host = "localhost";       // biasanya 'localhost' untuk server lokal
$username = "procapital";       // ganti sesuai dengan user database kamu
$password = "71im4b65";    // password database
$database = "procapital";       // nama database sesuai yang kamu buat

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Jika ingin menampilkan pesan koneksi berhasil (opsional)
// echo "Koneksi database berhasil!";
?>