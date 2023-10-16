<?php


$userName = isset($_REQUEST['userName']) && !empty($_REQUEST['userName']) ?
            $_REQUEST['userName']: null;

if (isset($_GET['action']) && $_GET['action'] === 'logout'){
    setcookie('userName', null, -1);
    unset($_COOKIE['userName']);
}
if ($userName !== null) {
    $expires = time() + 86400;
    setcookie('userName', $userName, $expires);
}
if (isset($_COOKIE['userName'])){
    var_dump($_COOKIE);
    // die;
}

$pageHeader = "Добро пожаловать!";

require_once "view/home.php";
