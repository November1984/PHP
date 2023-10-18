<?php
include "getUserName.php";
$pageHeader = "Добро пожаловать"; 
$pageHeader .= ((bool)$userName) ?  "!" : ", $userName!";

require_once "view/home.php";
