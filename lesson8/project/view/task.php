<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список делоф</title>
</head>
<body>
    <h2>Привет<?php (isset($userName)&&(bool)$userName ) ? print(", $userName!")
                     : print("!")?></h2>
    <?php include "menu.php"?>
    <form method="post">
        <input type="text" name="newTask" placeholder="Какова задача?">
        <input type="submit" value="Добавить">
    </form>
    <?php if (isset($undoneTasks)) {?>
    <ul>
    <?php foreach($undoneTasks as $task) :?>
            <li id="<?=$task->getTaskID()?>"><?php 
            if (gettype($task)==="string") {
                            echo $task . ";" ;
                        } else {
                            echo $task->getDescription() .";";
                 ?>
            [<a href="/?controller=tasks&taskID=<?=$task->getTaskID()?>">Сделано!</a>]
            <button class="doneBtn" data-id="<?=$task->getTaskID()?>">Done</button>
        <?php } ?>
        </li>
        <?php endforeach;?>
    </ul>
    <?php }?>
<script>
    let buttons = document.querySelectorAll('.doneBtn');
    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (
                async () => {
                    const response = await fetch('/?controller=tasks&action=apidone&taskID=' + id);
                    const answer = await response.json();
                    document.getElementById(answer.taskID).remove();
                }
            )();
        })
    })
</script>
</body>
</html>