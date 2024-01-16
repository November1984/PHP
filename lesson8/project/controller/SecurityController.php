<?php

// Если нажата кнопка "Выйти"
if (isset($_GET['action']) && $_GET['action'] === 'logout'){
    setcookie('userName', null, -1); //, '/; samesite=none'
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

// Если имя известно
if (isset($_SESSION['userName'])) {
    $userName = $_SESSION['userName'];
    header('location: /?controller=home');
    die();
}


require_once 'view/signin.php';