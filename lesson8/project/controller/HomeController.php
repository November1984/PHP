<?php
include "getUserName.php";

// $fun = function(&$userName){
//      $userName = "";
//      return "!";
//     };
    $fun2 = function(&$userName){
        // Теперь если пользователь не авторизован, перекидывает на главную и чистит куки
        if(gettype($_SESSION['userName']) === 'string'){
            $userName = "";
        setcookie('userName', null, -1); //, '/; samesite=strict'
        unset($_SESSION['userName']);
        return "!!";
    }
    return ", $userName!";
 };
$pageHeader = "Добро пожаловать"; 

$pageHeader .= (isset($userName) && (bool) $userName) ? $fun2($userName) : (die ("Верните_ \$fun(\$userName) _ в HomeController!"));

require_once "view/home.php";

