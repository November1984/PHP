<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body>
    <h1><?=$pageHeader?></h1>
    <a href="?userName=Господин">Войти ;)</a>
    <?php if ($userName !== null) : ?>
        <p>Рады вас приветствовать, <?=$userName?></p>
    <?php endif; ?>
</body>
</html>