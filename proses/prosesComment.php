<?php

include("../config.php");

$comment = htmlentities($_POST['comment']);
$iduser = $_POST['iduser'];
$toiduser = $_POST['toiduser'];
$idtweet = $_POST['idtweet'];

$sqlComment = mysqli_query($db_koneksi, "INSERT INTO comments (commentid, idtweet, iduser, toiduser, dateComment, comment) VALUES ('', $idtweet, $iduser, $toiduser, NOW(), '$comment')");
if ($sqlComment) {
    // hitung jumlah komentar
    mysqli_query($db_koneksi, "UPDATE tweet SET totalComment = totalComment+1 WHERE idtweet = $idtweet");
    header("Location: ../index.php?comment=berhasil");
} else {
    header("Location: ../index.php?comment=gagal");
}
