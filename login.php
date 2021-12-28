<?php
session_start();
include "config.php";

// Jika sudah login
if (isset($_SESSION['userlogin'])) {
    // Diarahkan ke halaman utama
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">

    <style>
        * {
            font-family: Poppins;
        }
    </style>

</head>

<body class="w-full h-screen justify-center items-center flex bg-gradient-to-r from-cyan-500 to-blue-500">
    <div class="w-3/5 h-3/4 bg-white drop-shadow-2xl rounded-md">
        <div class="container h-full flex flex-row">
            <div class="w-1/3 rounded-l-md bg-[url('https://i.ibb.co/SQmBNbm/download-ixid-Mnwx-Mj-A3f-DF8-MXxhb-Gx8-MTF8f-Hx8f-Hwyf-Hwx-Nj-Qw-Nj-Yw-NDU1-force-true-w-1920.jpg')] bg-cover"></div>
            <img src="assets/icon.png" alt="Icon" class="w-1/6 absolute right-0 top-5">
            <div class="w-2/3 p-5 flex items-center">
                <div class="container flex flex-col">
                    <h1 class="text-4xl font-bold mb-10">Login</h1>
                    <form action="proses/prosesLogin.php" method="POST" class="flex flex-col">

                        <div class="input-group flex flex-col mb-4">
                            <label for="username" class="font-medium text-lg mb-1">Username</label>
                            <input type="text" id="username" name="username" class="rounded-md p-3 border-solid border-2 border-gray-200">
                        </div>

                        <div class="input-group flex flex-col mb-1">
                            <label for="password" class="font-medium text-lg mb-1">Password</label>
                            <input type="password" id="password" name="password" class="rounded-md p-3 border-solid border-2 border-gray-200">
                        </div>
                        <div class="input-group flex flex-row mb-5 items-center">
                            <input type="checkbox" onclick="showPassword()" class="rounded text-sky-500">
                            <p class="ml-2">Tampilkan Password</p>
                        </div>

                        <button name="submit" class="bg-sky-200 px-5 py-2 rounded-lg duration-150 font-semibold hover:bg-sky-300 w-5/10">Log In</button>

                        <p class="font-medium">Anda belum punya akun? <a href="register.php" class="text-sky-500 hover:text-sky-700">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>