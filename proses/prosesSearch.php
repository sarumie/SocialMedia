<?php
include "../config.php";
?>
<div class="box box-search">
    Hasil Pencarian :
    <!-- div.resultsrc -->
    <?php
    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($db_koneksi, $_POST['query']);
        $query = mysqli_query($db_koneksi, "SELECT * FROM user WHERE username LIKE '%" . $search . "%' OR fullname LIKE '%" . $search . "%' ORDER BY RAND() LIMIT 3");
        $count = mysqli_num_rows($query);
        if ($count > 0) {
            echo "(" . $count . ") Hasil Pencarian :";
            while ($row = mysqli_fetch_array($query)) {
    ?>
                <a href="user.php?id=<?= $row['iduser']; ?>">
                    <li><b><?= $row['fullname']; ?></b> <span class="identity">@<?= $row['username']; ?></span></li>
                </a>
    <?php
            }
        }
    }
    ?>
</div>