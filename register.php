<?php 

session_start();
if(isset($_SESSION['userlogin'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/login-register.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <form action="proses/prosesDaftar.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Fullname" name="fullname">
            </div>
            <div class="input-group">
                <input type="text" placeholder="Email" name="email">
            </div>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="input-group">
                <input name="password1" type="password" placeholder="Password">
            </div>
            <div class="input-group">
                <input name="password2" type="password" placeholder="Confirm Password">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login</a></p>
        </form>
    </div>
</body>
</html>