<?php

include "getUserName.php";

$pdo = require"db.php";
$taskProvider = new TaskProvider($pdo);

// Добавлена новая задача
if(isset($_POST["newTask"])){
    $taskProvider->addTask($userName, $_POST["newTask"]);
    unset($_POST["newTask"]);
}


// Отметка о готовности задачи
if (isset($_GET["taskID"])){
    $taskProvider->setTaskAsDone($_GET['taskID']);
    //    var_dump ($undoneTasks[$_GET["taskID"]]);//["tasks"][$_GET["taskID"]]->setIsDone();
    unset($_GET["taskID"]);
}

// Выгрузка списка задач
// Если список пуст, то возвращает строку
$undoneTasks = $taskProvider->getUndoneTasksCount($userName) > 0 ?
     $taskProvider->getUndoneList($userName) // Массив строк
: ["Список задач пуст"];
/*
Добавить  в TaskProvider метод setIsDone, чтобы отмечать таски как сделанные и убирать их из списка
либо в $undoneTasks клалсть объекты 
 */

require_once "view/task.php";