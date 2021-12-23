<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="icon/icon.css">
    <script src="script/jquery.js" type="text/javascript"></script>
</head>

<body>

    <!--<div class="modal">
        <div class="modal-content">

        </div>
    </div>-->
    <table class="table">
        <thead>
            <tr>
                <th>Sosial Media</th>
                <th>
                    <!-- search bar -->

                </th>
                <th>
                    <div class="menu">
                        <li><a href="index.php">Beranda</a></li>
                        <li>(10) Notifikasi</li>
                        <li>
                            <div class="menu-top">
                                <span class="identity">
                                    <strong><a href="profile.php">Akun saya</a></strong>
                                </span>
                                <div class="profile">
                                    <div class="profile-picture">
                                        <img src="image.jpg" alt="A">
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
                <td colspan="3">
                    <!-- profile and cover -->
                    <div class="profile-info">
                        <div class="cover">
                            <!-- cover -->
                            <div class="cover-img">
                                <img src="image.jpg" alt="A">
                            </div>
                            <div class="config">
                                <i class="icon-cog"></i>
                            </div>
                        </div>
                        <!-- profile pic -->
                        <span class="profile the-profile">
                            <div class="profile-picture">
                                <img src="image.jpg" alt="A">
                            </div>
                            <div class="identity">
                                <strong>saya</strong>
                                <small>@pengguna</small>
                            </div>
                        </span>
                    </div>
                </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <td>
                    <li>Galeri</li>
                    <li>Pengikut</li>
                    <li>Mengikuti</li>
                    <li><a href="" class="link-out">Keluar <i class="icon-signout"></i></a></li>
                </td>
                <td>

                    <?php
                    for ($i = 0; $i <= 5; $i++) {
                    ?>

                        <!-- feeds area -->
                        <div class="box">
                            <!-- header /box -->
                            <div class="header-box">
                                <li>
                                    <!-- profile and name -->
                                    <span class="profile">
                                        <div class="profile-picture">
                                            <img src="image.jpg" alt="A">
                                        </div>
                                        <span class="identity">
                                            <strong><a href="user.php?id=" class="u">Pengguna</a></strong>
                                            <!-- user (@) -->
                                            <div class="user-n">
                                                <small>@pengguna
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
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa consectetur iste blanditiis praesentium sequi veritatis eos reprehenderit, a aliquid distinctio magni consequuntur sunt.
                                </span>
                                <!-- image post -->
                                <div class="image-post">
                                    <img src="image.jpg" alt="A">
                                </div>
                            </div>
                            <!-- public responses -->
                            <div class="reactions">
                                <!-- reaction -->
                                <div class="gv-react">
                                    <li>
                                        <button class="button btn btn-responses"><i class="icon-heart-empty"></i></button>
                                    </li>
                                    <li>
                                        <button class="button btn btn-responses"><i class="icon-comment-alt"></i></button>
                                    </li>
                                    <li>
                                        <button class="button btn btn-responses"><i class="icon-share"></i></button>
                                    </li>
                                </div>
                                <span class="post-date"><a href="">11rb like</a> / <a href="">110 cmnt</a> / <a href="">2 share</a> - Jun, 1 2020 11:21Pm</span>
                            </div>
                        </div>

                    <?php
                    }
                    ?>

                </td>
                <td>
                    <!-- For follow -->
                    <div class="side-right">
                        Mengikuti
                        <!-- max 7 -->
                        <?php
                        for ($i = 1; $i <= 7; $i++) {
                        ?>
                            <li>
                                <div class="friend friend-img">
                                    <img src="image.jpg" alt="">
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="recoms">
                        <h5>For follow</h5>
                        <?php
                        for ($i = 1; $i <= 3; $i++) {
                        ?>
                            <!-- list if didn't follow -->
                            <li>
                                <div class="profile recoms-user">
                                    <div class="profile-picture">
                                        <img src="image.jpg" alt="F">
                                    </div>
                                    <div class="identity">
                                        <span><a href="user.php?id=" class="u">Pengguna</a></span>
                                        <small>@puser</small>
                                    </div>
                                    <div class="options recoms-options">
                                        <button class="button btn btn-follow">Follow</button>
                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>