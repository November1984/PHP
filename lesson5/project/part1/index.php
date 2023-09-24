<?php

require_once "Task.php";
require_once "User.php";
require_once "Time.php";
require_once "Comment.php";
require_once "TaskService.php";

$user = new User("Семён", "kakoiTo@mail");
print_r($user);
// $user->tasks
// $user->addTask("Описание задачи 1");
$task = new Task($user, "Задача 3");

// print_r($user->getTasks());
$user->setSex("male");

// $user->addTask("Описание задачи 2");

echo "Создан пользователь:" . PHP_EOL;
print_r($user);
// print_r($user->getTasks()[1]);
sleep(5);
echo "Для задачи установлен приоритет:" . PHP_EOL;

// $user->getTasks()[1]->setPriority(2);
// print_r($user->getTasks()[1]);

echo "Пробую добавить комментарий" . PHP_EOL;
TaskService::addComment($user, $task, "Какой-то невнятный комментарий здесь...");
TaskService::addComment($user, $task, "Ещё один");

echo "Пробую вывести комментарий" . PHP_EOL;
print_r($task->getComments());
echo ($task->getComments()[0]->getText());