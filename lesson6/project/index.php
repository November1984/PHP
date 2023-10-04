<?php
var_dump($_GET);
    $title = "Наш сайт для php";
    $pageHeader = "Добро пожаловать!";
    $userName = "Анатолий";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
</head>
<body>
    <h1><?php echo $pageHeader; ?></h1>
    <?php if ($userName !== null) :?>
        <h3>Здравствуйте, <?=$userName?></h3>
    <?php endif; ?>

    <?php if ($userName === 'Василий') : ?>
        <p>Сообщение для Василия</p>
     <?php elseif ($userName === 'Анатолий') : ?>
        <p>Сообщение для Анатолия</p>
    <?php else : ?>
        <p>Сообщение для пользователя</p>
    <?php endif; ?>
</body>
</html>

<?php

?>