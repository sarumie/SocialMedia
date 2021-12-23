<?php
include "../config.php";

// File 1=> ubah foto profile
$uploadFotoName = $_FILES['fotoProfile']['name'];
$uploadFotoFile = $_FILES['fotoProfile']['tmp_name'];

// File 2=> ubah sampul/cover
$uploadCoverName = $_FILES['fotoSampul']['name'];
$uploadCoverFile = $_FILES['fotoSampul']['tmp_name'];

$iduser = $_POST['myid'];

// Ubah nama file 1
$ekstensi1 = strtolower(pathinfo($uploadFotoName, PATHINFO_EXTENSION));
$ekstensi2 = strtolower(pathinfo($uploadCoverName, PATHINFO_EXTENSION));

// File baru
$filebaru1 = "PROFILE_" . rand(100, 1000000) . "." . $ekstensi1;
$filebaru2 = "COVER_" . rand(100, 1000000) . "." . $ekstensi2;

// Folder
$folderFoto = "../assets/photo/";
$folderSampul = "../assets/cover/";

// Jika keduanya berisi file/ingin mengubah secara bersamaan

if (!empty($uploadFotoName) && !empty($uploadCoverName)) {
    // Jika ada file 1 dan file 2
    $sql1 = mysqli_query($db_koneksi, "UPDATE user SET foto = '$filebaru1' , cover = '$filebaru2' WHERE iduser = $iduser");
    if ($sql1) {
        if (move_uploaded_file($uploadFotoFile, "$folderFoto" . $filebaru1) && move_uploaded_file($uploadCoverFile, "$folderSampul" . $filebaru2)) {
            // Jika berhasil upload ke folder server
            header("Location: ../profile.php?upload1=success&upload2=success");
        } else {
            // Jika gagal upload ke folder server
            header("Location: ../profile.php?upload1=gagal&upload2=gagal");
        }
    } else {
        // Jika gagal ubah di databasenya
        header("Location: ../profile.php?update=gagal&failed=1");
    }
}
