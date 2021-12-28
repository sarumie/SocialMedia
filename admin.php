<?php
session_start();
include "config.php";
if (!isset($_SESSION['userlogin'])) {
    header("location: login.php");
}

if (!$_SESSION['level'] == 'admin') {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Page</title>
</head>

<body>
    <div class="navbar">
        <header>
            <h2>User Control</h2>
        </header>
    </div>
    <input type="text" id="search" placeholder="Search" class="search">
    <div class="main-button">
        <form action="index.php" method="get">
            <button class="home">Home</button>
        </form>
        <form action="profile.php" method="get">
            <button class="profile">Profile</button>
        </form>
    </div>
    <table class="users">
        <tr>
            <th>#</th>
            <th>Nickname</th>
            <th>Level</th>
        </tr>
        <?php
        $sql = "SELECT * FROM user";
        $query = mysqli_query($db_koneksi, $sql);

        if (!$query) {
            die('SQL ERROR : ' . mysqli_error($db_koneksi));
        }

        while ($row = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><a href="ubah.php?id=<?= $row['iduser']; ?>">Ubah</a> | <a href="hapus.php?id=<?= $row['iduser'] ?>" onclick='return confirm("Are u sure?")'>Hapus</a></td>
                <td><?= $row['username']; ?></td>
                <td><?= $row['level']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>