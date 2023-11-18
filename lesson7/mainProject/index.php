<?php
require_once 'model/User.php';
require_once "model/UserProvider.php";
require_once "model/Task.php";
require_once "model/TaskProvider.php";
session_start();

$controller = $_GET['controller'] ?? 'home';
$routes = require 'routes.php';
require_once $routes[$controller] ??  "view/404.php";

$pass = "1234";

// var_dump(password_hash($pass, PASSWORD_DEFAULT));
// var_dump(password_verify($pass, '$2y$10$pb0tqrGwgvsCxDoGZyVqnezhOMXlS2c0mVAVhvNqYzzICUjkEwOOa'));

// if (isset($routes[$controller])) {
//     require_once $routes[$controller];
// }
// else
// {
//     echo "404";
// }

