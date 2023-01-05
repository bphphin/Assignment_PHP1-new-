<?php
if (session_id() === '') {
    session_start();
}
require_once("../classes/typeClass.php");
$types = new Types();
$type = $types->all();
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header("Location: ../admin/login.php");
}
if (time() - $_SESSION['time'] > 600) {
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
    <title>Category List</title>
    <link rel="stylesheet" href="../library/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="alert alert-success">
        <h1>Login Success!</h1>
    </div>
    <div class="d-flex justify-content-between">
        <div class="mx-2">
            <h4 class="text-danger">Xin chào: <?= $_SESSION['username'] ?></h4>
        </div>
        <div class="btn btn-danger mx-2">
            <a href="?action=logout" class="text-decoration-none text-white">Đăng Xuất</a>
        </div>
    </div>
    <div class="d-flex justify-content-end align-items-center">
        <div class="btn btn-primary my-2 mx-2">
            <a href="createCategory.php" class="text-decoration-none text-white">Tạo mới</a>
        </div>
        <div class="btn btn-primary my-2 mx-2">
            <a href="petList.php" class="text-decoration-none text-white">Pet List</a>
        </div>
    </div>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Type Name</th>
                <th colspan="2">Action</th>
                <!-- <th>Update</th> -->
                <!-- <th>Delete</th> -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($type as $data) : ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['typeName'] ?></td>
                <td>
                    <a onclick="checkUpdate();" href="updateCategory.php?id=<?= $data['id'] ?>"
                        class="btn btn-info text-decoration-none">Update
                    </a>
                </td>
                <td>
                    <a onclick="checkDel();" href="deleteCategory.php?id=<?= $data['id'] ?>"
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
            event.defaultPrevented();
        }
    }

    function checkUpdate() {
        var result = confirm("Bạn có muốn thay đổi thông tin không?");
        if (result === false) {
            event.defaultPrevented();
        }
    }
    </script>
</body>

</html>