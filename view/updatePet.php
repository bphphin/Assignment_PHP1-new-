<?php
require_once("../classes/petClass.php");
$pets = new Pets();
$pet = $pets->getId($_GET['id']);
if (isset($_POST['btn'])) {
    $pets->update($_GET['id'], $_POST['typeID'], $_POST['petName'], $_POST['petType'], $_POST['petAge'], $_POST['petWeight'], $_POST['petImage']);
    header("Location: petList.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Pet</title>
    <link rel="stylesheet" href="../library/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <style>
    body {
        /* background-image: url(https://images.unsplash.com/photo-1442291928580-fb5d0856a8f1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80); */
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
</head>

<body>
    <h1 class="text-center text-uppercase mx-2 my-2">Update Pet</h1>
    <form action="" method="POST">
        <div class="form-group my-3">
            <label for="" class="form-label">TypeID:</label>
            <input type="text" name="typeID" id="" placeholder="Enter TypeID" class="form-control"
                value="<?= isset($pet['typeID']) ? $pet['typeID'] : '' ?>">
        </div>
        <div class="form-group my-3">
            <label for="" class="form-label">PetName:</label>
            <input type="text" name="petName" id="" placeholder="Enter PetName" class="form-control"
                value="<?= isset($pet['petName']) ? $pet['petName'] : '' ?>">
        </div>
        <div class="form-group my-3">
            <label for="" class="form-label">PetType:</label>
            <input type="text" name="petType" id="" placeholder="Enter PetType" class="form-control"
                value="<?= isset($pet['petType']) ? $pet['petType'] : '' ?>">
        </div>
        <div class="form-group my-3">
            <label for="" class="form-label">PetAge:</label>
            <input type="text" name="petAge" id="" placeholder="Enter PetAge" class="form-control"
                value="<?= isset($pet['petAge']) ? $pet['petAge'] : '' ?>">
        </div>
        <div class="form-group my-3">
            <label for="" class="form-label">PetWeight:</label>
            <input type="text" name="petWeight" id="" placeholder="Enter PetWeight" class="form-control"
                value="<?= isset($pet['petWeight']) ? $pet['petWeight'] : '' ?>">
        </div>
        <div class="form-group my-3">
            <label for="" class="form-label">PetImage:</label>
            <input type="file" name="petImage" id="" class="form-control" value="">
        </div>
        <div class="form-group my-3 text-center">
            <input type="submit" value="Update" class="btn btn-primary" name="btn">
        </div>
    </form>
</body>

</html>