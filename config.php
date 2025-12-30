<?php
session_start();

$host = "localhost";
$user = "procpital";
$pass = "71im4b65";
$db   = "procpital";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
  die("❌ Koneksi gagal: " . mysqli_connect_error());
}

$error = "";
$success = "";
?>
