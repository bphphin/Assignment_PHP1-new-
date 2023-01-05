<?php
require_once("../classes/petClass.php");
$pets = new Pets();
$pets->getId($_GET['id']);
$pets->delete($_GET['id']);
header("Location: petList.php");