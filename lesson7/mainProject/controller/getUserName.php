<?php
// Возвращаю имя пользователя строкой.


// Имя задано на странице авторизации

if (isset($_SESSION['userName'])) {
    if (gettype($_SESSION['userName']) === 'string') {
        $userName = $_SESSION['userName'];
    }
    else
    {
        $userName = $_SESSION['userName']->getUserName();
        $userLogin = $_SESSION['userName']->getLogin();
    }
} // или на главной странице, тогда сохраняем в сессию
elseif(isset($_REQUEST['userName']) && !empty($_REQUEST['userName'])) {
    $userName = $_REQUEST['userName'];
    $_SESSION['userName'] =  $userName;
}

// Проверка пустого имени и переход на страницу авторизации
if (! isset($userName) || $userName === "") {
    header('location: /?controller=home&userName=Smbd');
}