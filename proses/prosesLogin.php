<?php
session_start();
include "../config.php";

$username = mysqli_real_escape_string($db_koneksi, $_POST['username']);
$password = mysqli_real_escape_string($db_koneksi, md5($_POST['password']));

$sql = mysqli_query($db_koneksi, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
$row = mysqli_num_rows($sql);
$data = mysqli_fetch_array($sql);

if ($row == 1) {
    // Jika ada / sama maka akses login diberikan kepada akun yang ada
    $_SESSION['userlogin'] = $username;
    $_SESSION['iduser'] = $data['iduser'];
    // $_SESSION['level'] = $data['level'];

    if (isset($_SESSION['level'])) {
        if ($_SESSION['level'] == "admin") {
            // Jika admin maka ke halaman admin
            header('location: ../admin.php');
        } else {
            // Jika user biasa maka ke halaman utama
            header('location: ../index.php');
        }
    }
} else {
    echo "<script>
        location.href = '../login.php';
        alert('Gagal Login');
        </script>";
}
