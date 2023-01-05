<?php
require_once("../classes/typeClass.php");
require_once("../classes/check.php");
error_reporting(0);
$check = new Check();
$err = $check->checkForm();
$types = new Types();
if (isset($_POST['btn']) && empty($err)) {
    $types->new($_POST['typeName']);
    header("refresh:0.2, url=categoryList.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Category</title>
    <link rel="stylesheet" href="../library/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css">
</head>

<body>
    <h2 class="text-center text-uppercase mx-2 my-2">Thêm Mới Pet</h2>
    <form action="" method="POST">
        <!-- <div class="form-group p-3">
            <label for="" class="form-label">TypeID:</label>
            <input type="text" name="typeID" id="" placeholder="Enter TypeID" class="form-control">
        </div> -->
        <div class="form-group p-3">
            <label for="" class="form-label">TypeName:</label>
            <input type="text" name="typeName" id="" placeholder="Enter TypeName" class="form-control">
            <?php if (!empty($err)) : ?>
            <div class="alert alert-info my-1"><?= $err ?></div>
            <?php endif ?>
        </div>
        <div class="form-group p-3 text-center">
            <input type="submit" value="Thêm Mới" name="btn" class="btn btn-primary">
        </div>
    </form>
</body>

</html>