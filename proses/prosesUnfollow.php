<?php
include "../config.php";


$iduser = $_POST['iduser'];
$toiduser = $_POST['toiduser'];

$sqlunfollow = mysqli_query($db_koneksi, "DELETE FROM follow WHERE fromiduser = $toiduser AND toiduser = $iduser");
if($sqlunfollow){
    echo "Berhasil Unfollow";
}else{
    echo "Gagal Unfollow";
}
