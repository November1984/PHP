<?php

$userName = isset($_REQUEST['userName']) && !empty($_REQUEST['userName']) ?
            $_REQUEST['userName']: null;

if (isset($_GET['action']) && $_GET['action'] === 'logout'){
    setcookie('userName', null, -1);
    unset($_SESSION['userName']);
}
$userName = null;
if (isset($_SESSION['userName'])){
    $userName = $_SESSION['userName'];
}
elseif(isset($_REQUEST['userName']) && !empty($_REQUEST['userName'])) {
    $userName = $_REQUEST['userName'];
   $_SESSION['userName'] =  $userName;
}

if (isset($_SESSION['userName'])) {
    if (gettype($_SESSION['userName']) === 'string') {
    $userName = $_SESSION['userName'];
    }
    else
    {
        $userName = $_SESSION['userName']->getUserName();
    }
}
$pageHeader = "Добро пожаловать"; 
$pageHeader .= empty($userName) ?  "!" : ", $userName!";

require_once "view/home.php";
