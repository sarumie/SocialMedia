<?php
session_start();
include "config.php";

if (!isset($_SESSION['userlogin'])) {
    header("location: login.php");
}

$sql = mysqli_query($db_koneksi, "SELECT * FROM user WHERE username = '" . $_SESSION['userlogin'] . "'");
$user = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="icon/icon.css">
    <script src="script/jquery.js" type="text/javascript"></script>
    <script src="script/main.js" type="text/javascript"></script>
</head>

<body>
    <!-- Result Galeri -->
    <!-- <div class="tampilgaleri">

    </div> -->
    <table class="table">
        <thead>
            <tr>
                <th><img src="assets/icon.png" alt="Icon" id="icon" onclick="location.href='index.php'"></th>
                <th>
                    <!-- search bar -->
                    <form action="#" method="post" class="form-search">
                        <input type="search" name="search" class="input-search input" name="search" id="search" placeholder="Search something?" />
                        <button type="submit" class="button btn-search"><i class="icon-search"></i></button>
                    </form>
                </th>
                <th>
                    <div class="menu">
                        <li><a href="index.php">Beranda</a></li>
                        <!-- <li>(10) Notifikasi</li> -->
                        <li>
                            <div class="menu-top">
                                <span class="identity">
                                    <strong><a href="profile.php"><?= $user['fullname']; ?></a></strong>
                                </span>
                                <div class="profile">
                                    <div class="profile-picture">
                                        <img src="assets/photo/<?= $user['foto']; ?>" alt="A">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <li><a href="profile.php">Profile</a></li>
                    <!-- <li><span class="galeri">Galeri</span></li> -->
                    <li><a href="logout.php" class="link-out">Keluar <i class="icon-signout"></i></a></li>
                </td>
                <td>
                    <!-- search result -->
                    <div class="result-search">

                    </div>

                    <!-- create new post -->
                    <div class="box">
                        <div class="header-box">
                            <span class="profile">
                                <div class="profile-picture">
                                    <img src="assets/photo/<?= $user['foto']; ?>" alt="profile">
                                </div>
                                <form action="proses/prosesPosting.php" method="post" class="form-tweet" enctype="multipart/form-data">
                                    <textarea name="tw" class="input-tweet" cols="56" placeholder="Apa yang kamu pikirkan ?"></textarea>
                                    <br>
                                    <input type="file" name="gambar" class="file-gambar">
                                    <br>
                                    <!-- Sembunyikan ID -->
                                    <input type="hidden" name="iduser" value="<?= $user['iduser']; ?>">
                                    <button type="submit" name="postTweet" class="btn-posting button">Kirim</button>
                                </form>
                            </span>
                        </div>
                    </div>
                    <?php
                    // Tampilkan tweet pengguna
                    // Hanya tampilkan tweet yang saya ikuti
                    $sqltw = mysqli_query($db_koneksi, "SELECT * FROM tweet as p WHERE p.iduser = " . $user['iduser'] . " OR (p.iduser IN (SELECT toiduser FROM follow WHERE fromiduser = " . $user['iduser'] . ") AND p.tw <> 'only by me') ORDER BY dateTw DESC");
                    while ($postingan = mysqli_fetch_array($sqltw)) {
                        // Tampilkan profil setiap pengguna
                        $sqlpengguna = mysqli_query($db_koneksi, "SELECT * FROM user WHERE iduser = " . $postingan['iduser']);
                        while ($pengguna = mysqli_fetch_array($sqlpengguna)) {

                    ?>
                            <!-- feeds area -->
                            <div class="box">
                                <!-- header /box -->
                                <div class="header-box">
                                    <li>
                                        <!-- profile and name -->
                                        <span class="profile">
                                            <div class="profile-picture">
                                                <img src="assets/photo/<?= $pengguna['foto']; ?>" alt="A">
                                            </div>

                                            <span class="identity">
                                                <strong><a href="user.php?id=<?= $pengguna['iduser']; ?>" class="u"><?= $pengguna['fullname']; ?></a></strong>
                                                <!-- user (@) -->
                                                <div class="user-n">
                                                    <small>@<?= $pengguna['username']; ?>
                                                        <!-- times ago -->
                                                    </small>
                                                </div>
                                            </span>

                                            <div class="options">
                                                <i class="icon-ellipsis-vertical"></i>
                                            </div>
                                        </span>
                                    </li>
                                    <li></li>
                                </div>
                                <!-- show the post -->
                                <div class="show-post">
                                    <!-- for text only -->
                                    <span class="show-opini">
                                        <!-- Postingan pengguna -->
                                        <?= $postingan['tw']; ?>
                                    </span>
                                    <!-- Cek ada gambar atau tidak -->
                                    <?php if ($postingan['postImg']) { ?>
                                        <!-- image post -->
                                        <div class="image-post">
                                            <img src="assets/post/<?= $postingan['postImg']; ?>" alt="A">
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- public responses -->
                                <div class="reactions">
                                    <!-- reaction -->
                                    <div class="gv-react">
                                        <li>
                                            <?php
                                            $sqlLike = mysqli_query($db_koneksi, "SELECT * FROM likes WHERE toiduser = " . $pengguna['iduser'] . " AND idtweet = " . $postingan['idtweet']);
                                            if (mysqli_num_rows($sqlLike) == 1) {
                                            ?>
                                                <button class="button btn btn-responses unlike<?= $postingan['idtweet']; ?>" onclick="doUnlike(<?= $postingan['idtweet'] . ',' . $user['iduser'] . ',' . $pengguna['iduser']; ?>)"><i class="icon-heart"></i></button>
                                                <button class="button btn btn-responses hide like<?= $postingan['idtweet']; ?>" onclick="doLike(<?= $postingan['idtweet'] . ',' . $user['iduser'] . ',' . $pengguna['iduser']; ?>)"><i class="icon-heart-empty"></i></button>
                                            <?php
                                            } else {
                                            ?>
                                                <button class="button btn btn-responses like<?= $postingan['idtweet']; ?>" onclick="doLike(<?= $postingan['idtweet'] . ',' . $user['iduser'] . ',' . $pengguna['iduser']; ?>)"><i class="icon-heart-empty"></i></button>
                                                <button class="button btn btn-responses hide unlike<?= $postingan['idtweet']; ?>" onclick="doUnlike(<?= $postingan['idtweet'] . ',' . $user['iduser'] . ',' . $pengguna['iduser']; ?>)"><i class="icon-heart"></i></button>
                                            <?php
                                            }
                                            ?>
                                        </li>
                                        <li>
                                            <button class="button btn btn-responses btncommentid<?= $postingan['idtweet']; ?>" onclick="showComment(<?= $postingan['idtweet']; ?>)"><i class="icon-comment-alt"></i></button>
                                        </li>
                                        <li>
                                            <!-- <button class="button btn btn-responses"><i class="icon-share"></i></button> -->
                                        </li>
                                    </div>
                                    <span class="post-date"><a href=""><?= $postingan['totalLike']; ?> Like</a> / <a href=""><?= $postingan['totalComment']; ?> Komentar </a><?= date('M d,Y H:i', strtotime($postingan['dateTw'])) ?></span>
                                </div>
                                <!-- Comment -->
                                <div class="comment-area hide commentfromid<?= $postingan['idtweet']; ?>">
                                    <div class="comment">
                                        <form action="proses/prosesComment.php" method="POST">
                                            <textarea name="comment" placeholder="Ketik Komentar" cols="50" rows="1"></textarea>
                                            <input type="hidden" name="iduser" value="<?= $user['iduser']; ?>">
                                            <input type="hidden" name="toiduser" value="<?= $pengguna['iduser']; ?>">
                                            <input type="hidden" name="idtweet" value="<?= $postingan['idtweet']; ?>">
                                            <button type="submit" name="postComment" class="button btn btn-comment">Kirim</button>
                                        </form>
                                    </div>
                                    <!-- Tampilkan komentar -->
                                    <div class="show-comment">
                                        <?php
                                        $sqlshowcomment = mysqli_query($db_koneksi, "SELECT * FROM comments WHERE idtweet = " . $postingan['idtweet'] . " ORDER BY RAND() LIMIT 3");
                                        while ($showcomment = mysqli_fetch_array($sqlshowcomment)) {
                                            //tampilkan user sesuai komentar
                                            $sqlusercomment = mysqli_query($db_koneksi, "SELECT * FROM user WHERE iduser = " . $showcomment['iduser']);
                                            while ($usercomment = mysqli_fetch_array($sqlusercomment)) {
                                        ?>
                                                <li><a href=""><strong><?= $usercomment['fullname']; ?></strong> @<?= $usercomment['username']; ?></a>: <?= $showcomment['comment']; ?></li>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </td>
                <td>
                    <!-- For follow -->
                    <div class="recoms">
                        <h5>For follow</h5>
                        <?php
                        // Tampilkan user lain
                        $sqluserlain = mysqli_query($db_koneksi, "SELECT * FROM user as p WHERE p.iduser != " . $user['iduser'] . " OR(p.iduser IN (SELECT toiduser FROM follow WHERE toiduser = " . $user['iduser'] . ") AND p.username <> 'only by me') ORDER BY RAND() LIMIT 3");
                        while ($userlain = mysqli_fetch_array($sqluserlain)) {
                            // Cek status follow
                            $sqlfollowed = mysqli_query($db_koneksi, "SELECT * FROM follow WHERE fromiduser = " . $userlain['iduser'] . " AND toiduser = " . $user['iduser']);
                            // Cek 
                            if (mysqli_num_rows($sqlfollowed) !== 1) { // Jika belum diikuti
                                // Cek apakah sudah diikuti atau belum
                                // Hanya menampilkan user yang belum di follow
                                if ($user['iduser'] != $userlain['iduser']) {
                                    // Jangan tampilkan akun saya di rekomendasi
                        ?>
                                    <!-- list if didn't follow -->
                                    <li>
                                        <div class="profile recoms-user">
                                            <div class="profile-picture">
                                                <img src="assets/photo/<?= $userlain['foto']; ?>" alt="F">
                                            </div>
                                            <div class="identity">
                                                <span><a href="user.php?id=<?= $userlain['iduser']; ?>" class="u"><?= $userlain['fullname']; ?></a></span>
                                                <small>@<?= $userlain['username']; ?></small>
                                            </div>
                                            <div class="options recoms-options">
                                                <button class="button btn btn-follow btnfollowid<?= $userlain['iduser']; ?>" onclick="dofollow(<?= $userlain['iduser']; ?>, <?= $user['iduser']; ?>, '1')">Follow</button>
                                            </div>
                                        </div>
                                    </li>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                    <!-- Tampilkan user yang sudah diikuti -->
                    <div class="recoms">
                        <h5>Following</h5>
                        <?php
                        $sqlfollowing = mysqli_query($db_koneksi, "SELECT * FROM user WHERE iduser != " . $user['iduser']);
                        while ($userfollowing = mysqli_fetch_array($sqlfollowing)) {
                            // Cek status mengikuti
                            $sqlstatusfollowing = mysqli_query($db_koneksi, "SELECT * FROM follow WHERE toiduser = " . $user['iduser'] . " AND fromiduser = " . $userfollowing['iduser']);
                            if (mysqli_num_rows($sqlstatusfollowing) == 1) {
                        ?>
                                <li>
                                    <div class="profile recoms-user">
                                        <div class="profile-picture">
                                            <img src="assets/photo/<?= $userfollowing['foto']; ?>" alt="F">
                                        </div>
                                        <div class="identity">
                                            <span><a href="user.php?id=<?= $userfollowing['iduser']; ?>" class="u"><?= $userfollowing['fullname']; ?></a></span>
                                            <small>@<?= $userfollowing['username']; ?></small>
                                        </div>
                                        <div class="options recoms-options">
                                            <button class="button btn btn-unfollow btnunfollowid<?= $userfollowing['iduser']; ?>" onclick="doUnfollow(<?= $user['iduser'] . ', ' . $userfollowing['iduser']; ?>, 1)">UnFollow</button>
                                        </div>
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>