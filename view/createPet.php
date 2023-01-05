<?php
require_once("../classes/petClass.php");
require_once("../classes/check.php");
$check = new Check();
$err = $check->checkForm();
$pets = new Pets();
if (isset($_POST['btn']) && empty($err)) {
    $typeID = $_POST['typeID'];
    $petName = $_POST['petName'];
    $petType = $_POST['petType'];
    $petAge = $_POST['petAge'];
    $petWeight = $_POST['petWeight'];
    $imgFolder = "imgs/" . basename($_FILES['petImage']['name']);
    $petImage = $_FILES['petImage']['name'];
    $pets->new($typeID, $petName, $petType, $petAge, $petWeight, $petImage);
    header("refresh:0.2,url=petList.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Mới Pet</title>
    <link rel="stylesheet" href="../library/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <style>
    body {
        /* background-image: url(https://images.unsplash.com/photo-1541781774459-bb2af2f05b55?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1160&q=80); */
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>

<body>
    <h2 class="text-center text-uppercase mx-2 my-2">Thêm Mới Pet</h2>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group p-3">
                <label for="" class="form-label">TypeID:</label>
                <input type="text" name="typeID" id="" placeholder="Enter TypeID" class="form-control">
                <?php if (!empty($err)) : ?>
                <div class="alert alert-warning my-1"><?= $err ?></div>
                <?php endif ?>
            </div>
            <div class="form-group p-3">
                <label for="" class="form-label">PetName:</label>
                <input type="text" name="petName" id="" placeholder="Enter PetName" class="form-control">
                <?php if (!empty($err)) : ?>
                <div class="alert alert-warning my-1"><?= $err ?></div>
                <?php endif ?>
            </div>
            <div class="form-group p-3">
                <label for="" class="form-label">PetType:</label>
                <input type="text" name="petType" id="" placeholder="Enter PetType" class="form-control">
                <?php if (!empty($err)) : ?>
                <div class="alert alert-warning my-1"><?= $err ?></div>
                <?php endif ?>
            </div>
            <div class="form-group p-3">
                <label for="" class="form-label">PetAge:</label>
                <input type="text" name="petAge" id="" placeholder="Enter PetAge" class="form-control">
                <?php if (!empty($err)) : ?>
                <div class="alert alert-warning my-1"><?= $err ?></div>
                <?php endif ?>
            </div>
            <div class="form-group p-3">
                <label for="" class="form-label">PetWeight:</label>
                <input type="text" name="petWeight" id="" placeholder="Enter PetWeight" class="form-control">
                <?php if (!empty($err)) : ?>
                <div class="alert alert-warning my-1"><?= $err ?></div>
                <?php endif ?>
            </div>
            <div class="form-group p-3">
                <label for="" class="form-label">PetImage:</label>
                <input type="file" name="petImage" id="" class="form-control">
                <?php if (!empty($err)) : ?>
                <div class="alert alert-warning my-1"><?= $err ?></div>
                <?php endif ?>
            </div>
            <div class="form-group p-3 text-center">
                <input type="submit" value="Thêm Mới" class="btn btn-primary" name="btn">
            </div>
        </form>
    </div>
</body>

</html>