<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'config.php';

$client = new Google_Client();
$client->setClientId('248245173922-takkqj8cajqveq0v1puvpbgn08ebf2ej.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('https://sites.its.ac.id/inovasidigital/procapital/index/login-callback.php');
$client->addScope('email');
$client->addScope('profile');

if (isset($_GET['code'])) {
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (isset($token['error'])) {
            throw new Exception($token['error_description']);
        }

        $client->setAccessToken($token);
        $oauth = new Google_Service_Oauth2($client);
        $google_user = $oauth->userinfo->get();

        // Ambil data dari Google
        $email = $google_user->email;
        $name = $google_user->name;
        $google_id = $google_user->id;

        // Cek database dan masukkan user jika belum ada
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $insert = $conn->prepare("INSERT INTO users (email, name, google_id) VALUES (?, ?, ?)");
            $insert->bind_param("sss", $email, $name, $google_id);
            $insert->execute();
        }

        // Ambil ulang user untuk session
        $getUser = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $getUser->bind_param("s", $email);
        $getUser->execute();
        $userData = $getUser->get_result()->fetch_assoc();

        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['email']   = $userData['email'];
        $_SESSION['name']    = $userData['name'];
        $_SESSION['role']    = $userData['role'];

        header("Location: dashboard.php");
        exit;

    } catch (Exception $e) {
        echo "❌ Error saat ambil token Google: " . htmlspecialchars($e->getMessage());
    }
} else {
    echo "❌ Tidak ada kode Google yang dikembalikan.";
}
