<?php

include "getUserName.php";

if (!isset($userLogin)) {
    header ("location: /");
    die();
}

$pdo = require "db.php";
$taskProvider = new TaskProvider($pdo);

// Добавлена новая задача
if(isset($_POST["newTask"])){
    $taskProvider->addTask($userLogin, $_POST["newTask"]);
    unset($_POST["newTask"]);
    header("location: /?controller=tasks");
    die();
}

if (isset($_GET["action"]) && $_GET["action"] === "apidone") 
{
    $taskId = $_GET["taskID"] ?? null;
    // $userId = $_SESSION["userID"] ?? null;

    $response = [
        "status" => "Ok",
        "taskID" => $taskId
    ];

    try {
        $taskProvider->setTaskAsDone($taskId);
    } catch (TaskAlreadyIsDoneException $e) {
        $response = [
            "status" => "error",
            "error_message" => $e->getMessage(),
            "taskID" => $taskId
        ];
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();
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