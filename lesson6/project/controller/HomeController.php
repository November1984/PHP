<?php


$userName = isset($_POST['userName']) && !empty($_POST['userName']) ? $_POST['userName']: null;
$pageHeader = "Добро пожаловать!";

require_once "view/home.php";
