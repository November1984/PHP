<?php
require_once 'model/User.php';
require_once "model/UserProvider.php";
require_once "model/Task.php";
require_once "model/TaskProvider.php";
session_start();

$controller = $_GET['controller'] ?? 'home';
$routes = require 'routes.php';
require_once $routes[$controller] ??  "view/404.php";

// if (isset($routes[$controller])) {
//     require_once $routes[$controller];
// }
// else
// {
//     echo "404";
// }

