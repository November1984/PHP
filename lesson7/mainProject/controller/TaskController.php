<?php

include "getUserName.php";

$pdo = require"db.php";
$taskProvider = new TaskProvider($pdo);

if(isset($_POST["newTask"])){
    $taskProvider->addTask($userName, $_POST["newTask"]);

    // TaskProvider::addTask($userName, $_POST["newTask"], TaskProvider::getTasksCount($userName));
    unset($_POST["newTask"]);
}
$undoneTasks = $taskProvider->getUndoneTasksCount($userName) > 0 ?
     $taskProvider->getUndoneList($userName)
: ["Список задач пуст"];
var_dump($undoneTasks);
if (isset($_GET["taskID"])){
    $_SESSION[$userName]["tasks"][$_GET["taskID"]]->setIsDone();
    unset($_GET["taskID"]);
}
// if (isset($_SESSION[$userName])){
// print_r($_SESSION[$userName]);}
require_once "view/task.php";