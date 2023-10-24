<?php
include "getUserName.php";
// session_start();

var_dump($userName);
$pageHeader = "Добро пожаловать"; 
$pageHeader .= ((bool)$userName) ?  "!" : ", $userName!";

require_once "view/home.php";
