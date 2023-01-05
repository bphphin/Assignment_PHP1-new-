<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../library/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <style>
    #img {
        width: 100%;
    }
    </style>
</head>

<body>
    <img src="../images/1.avif" alt="" id="img">
    <?php
    $info = [
        'name' => 'Bùi Ngọc Phi',
        'code' => 'PH29465',
    ];
    ?>
    <div class="container d-flex justify-content-around my-3">
        <h3 class="text-uppercase text-danger">Họ tên: <?= $info['name'] ?></h3>
        <h3 class="text-uppercase text-danger">Mã SV: <?= $info['code'] ?></h3>
    </div>
    <div class="container-fluid p-5 d-flex justify-content-between">
        <div class="btn btn-primary">
            <a href="../admin/login.php" class="text-decoration-none text-white">Login</a>
        </div>
        <div class="btn btn-primary">
            <a onclick="alert('Bạn phải đăng nhập để sử dụng chức năng')" href="../view/petList.php"
                class="text-decoration-none text-white">Pet List
            </a>
        </div>
        <div class="btn btn-primary">
            <a onclick="alert('Bạn phải đăng nhập để sử dụng chức năng')" href="../view/categoryList.php"
                class="text-decoration-none text-white">Category List
            </a>
        </div>
    </div>




    <script>
    let imgs = [
        "../images/1.avif",
        "../images/2.avif",
        "../images/3.avif",
        "../images/4.avif",
    ];
    let index = 0;

    function slide() {
        document.getElementById('img').src = imgs[index];
        index++;
        if (index == imgs.length) {
            index = 0;
        }
        setTimeout("slide()", 2000);
    }
    slide();
    </script>
</body>

</html>