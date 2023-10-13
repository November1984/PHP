<?php


$userName = isset($_GET['userName']) && !empty($_GET['userName']) ? $_GET['userName']: null;
$pageHeader = "Добро пожаловать!";

require_once "view/home.php";
