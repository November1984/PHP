<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список делоф</title>
</head>
<body>
    <?php include "menu.php"?>
    <form method="post">
        <input type="text" name="newTask" placeholder="Какова задача?">
        <input type="submit" value="Добавить">
    </form>
    <ul>
    <?php foreach($undoneTasks as $task) {?>
            <li><?php 
            if (gettype($task)==="string") {
                            echo $task . ";" ;
                        } else {
                            echo $task->getDescription() .";";
                 ?>
            [<a href="/?controller=tasks&taskID=<?=$task->getTaskID()?>">Сделано!</a>]
        <?php } ?>
        </li>
        <?php }?>
    </ul>
</body>
</html>