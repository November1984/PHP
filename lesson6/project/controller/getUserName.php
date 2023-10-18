<?php

$userName = "";
// Имя может быть задано на странице авторизации
if (isset($_SESSION['userName'])) {
    if (gettype($_SESSION['userName']) === 'string') {
    $userName = $_SESSION['userName'];
    }
    else
    {
        $userName = $_SESSION['userName']->getUserName();
    }
} // или на главной странице, тогда сохраняем в сессию
elseif(isset($_REQUEST['userName']) && !empty($_REQUEST['userName'])) {
    $userName = $_REQUEST['userName'];
   $_SESSION['userName'] =  $userName;
}
// Проверка пустого имени и переход на страницу авторизации
if (!(bool)$userName){
    header('location: /?controller=security');
}