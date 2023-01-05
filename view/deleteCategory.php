<?php
require_once("../classes/typeClass.php");
$types = new Types();
$types->getId($_GET['id']);
$types->delete($_GET['id']);
header("Location: categoryList.php");