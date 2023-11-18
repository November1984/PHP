<?php

require_once "model/User.php";
require_once "model/UserProvider.php";

$pdo = require "db.php";

$user = new User("Geeeeeeker");
$user->setLogin("geek");

$userProvider = new UserProvider($pdo);
$userProvider->registerUser($user, "pass123");