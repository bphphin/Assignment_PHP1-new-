<?php
require_once("../classes/typeClass.php");
$types = new Types();
$type = $types->getId($_GET['id']);
$getType = $types->all();
if (isset($_POST['btn'])) {
    $types->update($_GET['id'], $_POST['typeName'], $_POST['type']);
    header("Location: categoryList.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <link rel="stylesheet" href="../library/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css">
</head>

<body>
    <h2 class="text-center text-uppercase mx-2 my-2">Update Pet</h2>
    <form action="" method="POST">
        <div class="form-group my-3">
            <input type="text" name="typeName" id="" placeholder="Enter TypeName" class="form-control"
                value="<?= isset($type['typeName']) ? $type['typeName'] : '' ?>">
        </div>
        <select name="type" id="" class="form-select">
            <?php foreach ($getType as $key => $value) : ?>
            <option value="<?= $value['id'] ?>">
                <?= $value['typeName'] ?></option>
            <?php endforeach ?>
        </select>
        <div class="form-group text-center my-3">
            <input type="submit" value="Update" name="btn" class="btn btn-primary">
        </div>
    </form>
</body>

</html>