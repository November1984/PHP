<?php
// require_once 'model/User.php';
// require_once "model/UserProvider.php";
// require_once "model/Task.php";
// require_once "model/TaskProvider.php";

// session_start();
$userName = "";
// Имя может быть задано на странице авторизации
// var_dump($_SESSION);
if (isset($_SESSION['userName'])) {
    if (gettype($_SESSION['userName']) === 'string') {
        $userName = $_SESSION['userName'];
    }
    else
    {
        $userName = $_SESSION['userName']->getUserName();
    }
} // или на главной странице, тогда сохраняем в сессию
elseif(isset($_REQUEST['userName']) && !empty($_REQUEST['userName'])) {
    $userName = $_REQUEST['userName'];
    $_SESSION['userName'] =  $userName;
}

// Проверка пустого имени и переход на страницу авторизации
if (! isset($userName) || $userName === "") {
    // var_dump($userName);
    header('location: /?controller=home');
}