<?php
include("../config.php");

$postingID = $_POST['postingID']; // idtweet
$iduser = $_POST['iduser'];
$toiduser = $_POST['toiduser'];

$sqlLike = mysqli_query($db_koneksi, "INSERT INTO likes (idlike, fromiduser, toiduser, idtweet, dateLikes) VALUES ('', $iduser, $toiduser, $postingID, NOW())");
if ($sqlLike) {
    // Jika berhasil
    echo "Berhasil memberi like";
    // hitung jumlah like
    // Masuk ke tweet
    mysqli_query($db_koneksi, "UPDATE tweet SET totalLike = totalLike+1 WHERE idtweet = $postingID");
} else {
    echo "Gagal memberikan like";
}
