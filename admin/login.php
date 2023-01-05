<?php
if (session_id() === '') {
    session_start();
}
require_once("../classes/check.php");
require_once("../classes/userClass.php");
// error_reporting(0);
$check = new Check(); //Check form
$msg = $check->checkLogin();
$users = new Users(); // Login
if (isset($_POST['btn'])) {
    $user = $users->logIn($_POST['email'], $_POST['password']);
    $_SESSION['time'] = time();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="../css/style.css" />
</head>

<body class="img js-fullheight" style="background-image: url(../images/bg.jpg)">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <?php if (isset($_POST['btn'])) {
                            if (!$user) { ?>
                        <div class="alert alert-danger">
                            <p>Thông tin tài khoản hoặc mật khẩu không chính xác , vui lòng thử lại!</p>
                        </div>
                        <?php } else {
                                header("refresh:0.2,url= ../view/petList.php");
                                exit(); // sau khi chuyển trang thì thoát tất cả các câu lệnh tiếp theo
                            }
                        } ?>
                        <h3 class="mb-4 text-center">Login</h3>
                        <form action="" class="signin-form" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email" name="email" />
                            </div>
                            <?php if (!empty($msg)) : ?>
                            <div class="alert alert-info"><?= $msg ?></div>
                            <?php endif ?>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="********"
                                    name="password" />
                                <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password">
                                </span>
                            </div>
                            <?php if (!empty($msg)) : ?>
                            <div class="alert alert-info"><?= $msg ?></div>
                            <?php endif ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3" name="btn">
                            Sign In
                        </button>
                    </div>
                    <div class="form-group d-md-flex">
                        <div class="w-50">
                            <label class="checkbox-wrap checkbox-primary">Remember Me
                                <input type="checkbox" />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="w-50 text-md-right">
                            <a href="#" style="color: #fff">Forgot Password</a>
                        </div>
                    </div>
                    </form>
                    <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                    <div class="social text-center">
                        <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span>
                            Facebook</a>
                        <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span>
                            Twitter</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>Don't have an a count?</p>
                        <a href="register.php?msg=success" class="">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>