<?php
if (session_id() === '') {
    session_start();
}
require_once("../classes/petClass.php");
require_once("../classes/userClass.php");
$users = new Users();
$user = $users->all();
$pets = new Pets();
$pet = $pets->getAll();
$_SESSION['username'] = $user[0]['username'];
if (isset($_GET['action']) && $_GET['action'] === "logout") {
    session_destroy();
    header("Location: ../admin/login.php");
}
if (time() - $_SESSION['time']  > 600) {
    session_destroy();
    header("Location: ../admin/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../library/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <style>
    img {
        width: 150px;
        height: 100px;
        object-fit: cover;
    }
    </style>
</head>

<body>
    <div class="alert alert-success">
        <h1>Login Success!</h1>
    </div>
    <div class="d-flex justify-content-between">
        <div class="mx-2">
            <h4 class="text-danger">Hello: <?= $_SESSION['username'] ?></h4>
        </div>
        <div class="btn btn-danger mx-2">
            <a href="?action=logout" class="text-decoration-none text-white">Log Out</a>
        </div>
    </div>
    <div class="d-flex justify-content-end align-items-center">
        <div class="btn btn-primary my-2 mx-2">
            <a href="createPet.php" class="text-decoration-none text-white">Tạo mới</a>
        </div>
        <div class="btn btn-primary my-2 mx-2">
            <a href="categoryList.php" class="text-decoration-none text-white">Category List</a>
        </div>
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Type Name</th>
                <th>Pet Name</th>
                <th>Pet Type</th>
                <th>Pet Age</th>
                <th>Pet Weight</th>
                <th>Pet Image</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pet as $data) : ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['typeName'] ?></td>
                <td><?= $data['petName'] ?></td>
                <td><?= $data['petType'] ?></td>
                <td><?= $data['petAge'] ?></td>
                <td><?= $data['petWeight'] ?></td>
                <td><img src="imgs/<?= $data['petImage'] ?>" alt=""></td>
                <td>
                    <a onclick=" return checkUpdate();" href="updatePet.php?id=<?= $data['id'] ?>"
                        class="btn btn-info text-decoration-none">Update
                    </a>
                </td>
                <td>
                    <a onclick=" return checkDel()" href="deletePet.php?id=<?= $data['id'] ?>"
                        class="btn btn-warning text-decoration-none">Delete
                    </a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <script>
    alert("Welcome to website!");

    function checkDel() {
        var result = confirm("Bạn có muốn xóa không?");
        if (result === false) {
            return false;
        }
    }

    function checkUpdate() {
        var result = confirm("Bạn có muốn thay đổi thông tin không?");
        if (result === false) {
            return false;
        }
    }
    </script>
</body>

</html>