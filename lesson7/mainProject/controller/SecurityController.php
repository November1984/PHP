<?php

// require_once 'model/User.php';
// require_once "model/UserProvider.php";
// require_once "model/Task.php";
// require_once "model/TaskProvider.php";
// session_start();

// Если нажата кнопка "Выйти"
if (isset($_GET['action']) && $_GET['action'] === 'logout'){
    setcookie('userName', null, -1);
    unset($_SESSION['userName']);
}

// Если заполнены данные формы на вход
$error = null;
if (isset($_POST['userName'], $_POST['password'])){
    ['userName' => $userName, 'password' => $password] = $_POST;

    $pdo = require "db.php";
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getUserNameByNameAndPassword($userName, $password);
    
    if (!(bool)$user) {
        $error = "Пользователь с указанными учётными данными не найден.";
    }
    else {
        $_SESSION['userName'] = $user;
    }
}

if (isset($_SESSION['userName'])) {
    //isset($_SESSION) & 
    // var_dump($_SESSION['userName']);
    $userName = $_SESSION['userName'];
    header('location: /?controller=home');
}

// var_dump(isset($_SESSION));
// var_dump($user);

require_once 'view/signin.php';