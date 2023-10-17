<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body>
    <h1><?=$pageHeader?></h1>
    <?php if ($userName !== null) : ?>
        <p>Рады вас приветствовать, <?=$userName?></p>
        <a href="?action=logout">Уйти ;)</a>
        <?php else : ?>
            <a href="?userName=Господин">Войти ;)</a>
            <form method="post"> 
            <input type="text" name="userName" placeholder="Введите ваше имя" />
            <input type="submit" value="Отправить">
        </form>
    <?php endif; ?>
</body>
</html>