<?php
include "getUserName.php";
// session_start();

//  var_dump($userName);
 $fun = function(&$userName){
     $userName = "";
     return "!";
 };
$pageHeader = "Добро пожаловать"; 
// var_dump($userName);
$pageHeader .= (isset($userName) && (bool) $userName) ? ", $userName!" : $fun($userName);

require_once "view/home.php";
