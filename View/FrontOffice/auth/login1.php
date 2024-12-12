<?php
include_once '../../../Controller/UserController.php';
include_once '../../../configuser.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylsheet" href="View\FrontOffice\auth\style.css">

</head>
<body>
    <div class="container">
        <div class="form-box login">
            <form action="">
              <h1>Login</h1>
              <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bx-user' ></i>
              </div>
              <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx bx-lock'></i>
              </div>
            <div class="forgot link">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <p>or login wiith social platforms</p>
            <div class="social-icons">
                <a href="#"><i class='bx bxl-google' ></i></a>
                <a href="#"><i class='bx bxl-facebook' ></i></a>
                <a href="#"><i class='bx bxl-github' ></i></a>
                <a href="#"><i class='bx bxl-linkedin-square' ></i></a>

    <script src="script.js"></script>
</body>
</html>