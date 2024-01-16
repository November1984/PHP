<?php


if (isset($_SESSION["userName"])){
    if (gettype($_SESSION["userName"]) != "string") {
    header("location: /");
    }
    else {
        require "getUserName.php";
    }
}
if (isset($_POST["userName"])) {
    $pdo = require "db.php";
    
    $userProvider = new UserProvider($pdo);
    $user = new User($_POST["userName"], $_POST["login"]);
    
    $userProvider->registerUser($user, $_POST["password"]);

    $_SESSION["userName"] = $user;
    header("location: /?controller=security");
}

require_once "view/registration.php";