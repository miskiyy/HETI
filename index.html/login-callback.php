<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php'; // Koneksi ke DB

$client = new Google_Client();
$client->setClientId('248245173922-bh9m8nf6o8pb9m6gqeoo9h3mk5cli83u.apps.googleusercontent.com');
$client->setClientSecret('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6');
$client->setRedirectUri('https://sites.its.ac.id/inovasidigital/procapital/login-callback.php');
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token['error'])) {
        $client->setAccessToken($token);
        $oauth = new Google_Service_Oauth2($client);
        $google_user = $oauth->userinfo->get();

        $email     = $google_user->email;
        $name      = $google_user->name;
        $google_id = $google_user->id;

        // 1. Cek apakah user sudah ada di database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            // 2. Jika belum ada, insert user baru
            $insert = $conn->prepare("INSERT INTO users (email, name, google_id) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $email, $name, $google_id);
            $insert->execute();
        }

        // 3. Ambil ulang data user untuk ambil ID dan role
        $getUser = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $getUser->bind_param("s", $email);
        $getUser->execute();
        $userResult = $getUser->get_result();
        $user = $userResult->fetch_assoc();

        // 4. Simpan session lengkap
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email']   = $user['email'];
        $_SESSION['name']    = $user['name'];
        $_SESSION['role']    = $user['role'];

        // 5. Redirect ke dashboard
        header("Location: dashboard.php");
        exit;

    } else {
        echo "❌ Error saat ambil token Google: " . $token['error_description'];
    }
} else {
    echo "❌ Kode Google tidak ditemukan.";
}
