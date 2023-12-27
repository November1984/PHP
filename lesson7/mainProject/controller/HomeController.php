<?php
include "getUserName.php";


$fun = function(&$userName){
     $userName = "";
     return "!";
 };
 $fun2 = function(&$userName){
 // Теперь если пользователь не авторизован, перекидывает на главную и чистит куки
    if(gettype($_SESSION['userName']) === 'string'){
        $userName = "";
        setcookie('userName', null, -1);
        unset($_SESSION['userName']);
        return "!!";
    }
    return ", $userName!";
 };
$pageHeader = "Добро пожаловать"; 
// var_dump($userName);
$pageHeader .= (isset($userName) && (bool) $userName) ? $fun2($userName) : $fun($userName);

require_once "view/home.php";

