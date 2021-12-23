<?php
include "../config.php";

$iduser = $_POST['iduser'];
$toiduser = $_POST['toiduser'];

$sqlfollow = mysqli_query($db_koneksi, "INSERT INTO follow (idfollow, fromiduser, toiduser, status, dateFollow) VALUES (NULL, $iduser, $toiduser, '1', NOW())");

if($sqlfollow){
    echo "Berhasil follow";
}else{
    echo "Gagal Follow";
}
?>