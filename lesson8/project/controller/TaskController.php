<?php

include "getUserName.php";

if (!isset($userLogin)) header ("location: /");

$pdo = require "db.php";
$taskProvider = new TaskProvider($pdo);

// Добавлена новая задача
if(isset($_POST["newTask"])){
    $taskProvider->addTask($userLogin, $_POST["newTask"]);
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
$undoneTasks = $taskProvider->getUndoneTasksCount($userLogin) > 0 ?
     $taskProvider->getUndoneList($userLogin) // Массив строк
: ["Список задач пуст"];

require_once "view/task.php";