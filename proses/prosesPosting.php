<?php
session_start();
include "../config.php";

$textTw = mysqli_real_escape_string($db_koneksi, $_POST['tw']);
$fileName = $_FILES["gambar"]["name"];
$fileGambar = $_FILES["gambar"]["tmp_name"];
$iduser = $_POST['iduser'];

if(isset($_POST['postTweet'])){
	// Cek jika ada fle gambar
	if(!empty($fileName)){
		// Jika ada file
		$ekstensi = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
		// Ubah nama
		$filebaru = "POSTING_".rand(100, 1000000).".".$ekstensi;
		// Folder
		$folder = "../assets/post/";
		
		$sqlPost = mysqli_query($db_koneksi, "INSERT INTO tweet (idtweet, iduser, tw, postImg, dateTw, totalLike, totalComment, totalShare) VALUES (NULL, $iduser, '$textTw', '$filebaru', NOW(), 0, 0, 0)");
	
		if($sqlPost){
			if(move_uploaded_file($fileGambar, "$folder".$filebaru)){
				// Jika berhasil mengupload gambar
				header("location: ../index.php?status=berhasil&upload=berhasil");
			}else{
				// Jika gagal upload gambar
				header("location: ../index.php?status=gagal&upload=gagal");
			}
		}else{
			// Jika gagal memposting dengan gambar
			header("location: ../index.php?posting=gagal");
		}
	}else{
		// Jika tidak ada file gambar maka upload hanya text
		$sqlPost = mysqli_query($db_koneksi, "INSERT INTO tweet (idtweet, iduser, tw, dateTw, totalLike, totalComment, totalShare) VALUES ('', $iduser, '$textTw', NOW(), 0, 0, 0)");
		if($sqlPost){
			header("location: ../index.php?status=berhasil&tanpa=gambar");
		}else{
			header("location: ../index.php?status=gagal&tanpa=gambar");
		}
	}
} else {
	echo "Error";
}
?>