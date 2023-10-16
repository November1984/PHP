<?php


$userName = isset($_REQUEST['userName']) && !empty($_REQUEST['userName']) ?
            $_REQUEST['userName']: null;

if ($userName !== null) {
    setcookie('userName', $userName);
}
if (isset($_COOKIE['userName'])){
    var_dump($_COOKIE);
    die;
}

$pageHeader = "Добро пожаловать!";

require_once "view/home.php";
