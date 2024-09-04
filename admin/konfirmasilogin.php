<?php
include('../koneksi/koneksi.php');
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Validasi apakah username atau password kosong
    if (empty($user)) {
        header("Location: login.php?gagal=userKosong");
        exit;
    } elseif (empty($pass)) {
        header("Location: login.php?gagal=passKosong");
        exit;
    }

    // Prepare dan bind
    $stmt = $conn->prepare("SELECT id, password FROM admin_users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->store_result();

    // Cek apakah user ditemukan
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        // Verifikasi password tanpa hashing
        if ($pass === $stored_password) {
            // Set session jika login berhasil
            $_SESSION['loggedin'] = true;
            $_SESSION['userid'] = $id;

            // Redirect ke halaman admin
            header("Location: admin.php");
            exit;
        } else {
            // Password salah
            header("Location: login.php?gagal=userpassSalah");
            exit;
        }
    } else {
        // Username tidak ditemukan
        header("Location: login.php?gagal=userpassSalah");
        exit;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    // Jika form belum dikirimkan
    header("Location: login.php");
    exit;
}
?>
