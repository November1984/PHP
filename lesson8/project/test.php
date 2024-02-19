<?php



// require_once "controller/SecurityController.php";
// require_once "model/UserProvider.php";


// $pdo = require "db.php";

// $userProvider = new UserProvider($pdo);
// print_r($userProvider->getAllUsers());

// $pdo = PDO("sqlite:database.db",null,null,
// [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
// );

// var_dump($pdo);

$drivers = PDO::getAvailableDrivers();
var_dump($drivers);