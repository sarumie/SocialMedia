<?php
include "../config.php";

$postingID = $_POST['postingID']; // idtweet
$iduser = $_POST['iduser'];
$toiduser = $_POST['toiduser'];

$sqlDislike = mysqli_query($db_koneksi, "DELETE FROM likes WHERE fromiduser = $iduser AND toiduser = $toiduser AND idtweet = $postingID");
if ($sqlDislike) {
    // Cek Dislike
    echo "Berhasil dislike";
    //
    mysqli_query($db_koneksi, "UPDATE tweet SET totalLike = totalLike-1 WHERE idtweet = $postingID");
} else {
    echo "Gagal dislike";
}
