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
    $user = new User(htmlspecialchars(strip_tags($_POST["userName"])), 
                     htmlspecialchars(strip_tags($_POST["login"])));
                     
    try {
        $userProvider->registerUser($user, $_POST["password"]);
        $_SESSION["userName"] = $user;
        header("location: /?controller=security");
    }
    catch (Exception $exception)
    {
        $error = $exception->getMessage();
    }

}

require_once "view/registration.php";