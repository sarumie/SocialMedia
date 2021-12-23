<?php

// File koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$db = "socialmedia";

// Koneksi ke mysql
$db_koneksi = mysqli_connect($host,$user,$password,$db) or die("Koneksi Gagal");

?>
