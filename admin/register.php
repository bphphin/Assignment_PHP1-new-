<?php
if (session_id() === '') {
    session_start();
}
require_once("../classes/userClass.php");
require_once("../classes/check.php");
// error_reporting(0);
$check = new Check();
$err = $check->checkSignUp();
$users = new Users();
if (isset($_POST['btn']) && empty($err)) {
    $user = $users->signUp($_POST['username'], $_POST['email'], $_POST['password']);
    $msg = $_GET['msg'];
    if ($user && $msg == 'success') {
        $msg = "Bạn đã đăng ký tài khoản thành công!";
    }
    header("refresh:1, url=login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="../fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="../library/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="../css/register.css">
    <style>
    /* #msg {
        display: none;
    } */

    .form-submit {
        cursor: pointer;
    }
    </style>
</head>

<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="../images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <?php if (isset($_POST['btn'])) : ?>
                        <div class="alert alert-success">
                            <h1 class="text-center text-uppercase"><?= isset($msg) ? $msg : '' ?>
                            </h1>
                        </div>
                        <?php endif ?>
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="Your Name" />
                        </div>
                        <?php if (!empty($err)) : ?>
                        <div class="alert alert-info"><?= $err ?></div>
                        <?php endif ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <?php if (!empty($err)) : ?>
                        <div class="alert alert-info"><?= $err ?></div>
                        <?php endif ?>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password"
                                placeholder="Password" />
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <?php if (!empty($err)) : ?>
                        <div class="alert alert-info"><?= $err ?></div>
                        <?php endif ?>
                        <!-- <div class="form-group">
                            <input type="password" class="form-input" name="re_password" id="re_password"
                                placeholder="Repeat your password" />
                        </div> -->
                        <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btn" id="submit" class="form-submit" value="Sign Up" />
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="../js/jquery/jquery.min.js"></script>
    <script src="../js/jquery/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>