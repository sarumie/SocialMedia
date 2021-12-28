<?php 
include "../config.php";

$fullname = mysqli_real_escape_string($db_koneksi, $_POST['fullname']);
$username = mysqli_real_escape_string($db_koneksi, $_POST['username']);
$password1 = mysqli_real_escape_string($db_koneksi, md5($_POST['password1']));
$password2 = mysqli_real_escape_string($db_koneksi, md5($_POST['password2']));
$email = $_POST['email'];
$level = "user"; // Otomatis setiap register dianggap level user

// Cek kesamaan password
if ($password1 == $password2){
  
    $sql = mysqli_query($db_koneksi, "INSERT INTO user (iduser, email, fullname, username, password, level, foto, cover) VALUES ('', '$email', '$fullname', '$username', '$password1', '$level', 'default.jpg', 'default_cover.jpg')");

    // Cek
    if($sql){
        // Jika berhasil daftar maka ke Login page
        echo "<script>
        location.href = '../login.php';
        alert('Berhasil mendaftarkan akun');
        </script>";
    } else {
        // Jika gagal
        echo "<script>
        alert('Gagal mendaftarkan akun');
        location.href = '../register.php';
        </script>";
        
    }
    echo "<script>alert('Berhasil Mendaftar')</script>";
} else {
    echo "<script>alert('Password yang dimaksudkan tidak sama!')</script>";
}
