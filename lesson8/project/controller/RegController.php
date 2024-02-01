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
        $userProvider->registerUser($user, htmlspecialchars(strip_tags($_POST["password"])));
        $_SESSION["userName"] = $user;
        header("location: /?controller=security");
    }
    catch (LengthException $exception)
    {
        $error = $exception->getMessage();
    }
    catch (Exception $exception)
    {
        $error = $exception->getMessage();
        $userLogin = $user->getLogin();
        $userName = $user->getUserName();
    }

}

require_once "view/registration.php";