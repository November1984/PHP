<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Главная</title>
</head>

<body>
    <h1><?= $pageHeader ?></h1>
    <?php if ((bool) $userName) : ?>
        <p>Рад вас приветствовать, <?= $userName ?></p>
        <?php include "menu.php" ?>
    <?php else : ?>
        <a href="/?controller=security">Войти</a><br>
        <a href="/?controller=registration">Зарегистрироваться</a><br>
    <?php endif; ?>
</body>

</html>