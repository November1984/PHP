<?php
require_once 'model/User.php';
require_once "model/UserProvider.php";
require_once "model/Task.php";
require_once "model/TaskProvider.php";

session_start();
require_once "exceptions/errorHandler.php";
require_once "exceptions/logger.php";

// throw new Exception ("Тестовая ошибка");

$controller = $_GET['controller'] ?? 'home';
$routes = require 'routes.php';
require_once $routes[$controller] ??  "view/404.php";

