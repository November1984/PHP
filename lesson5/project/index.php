<?php

require_once "Task.php";
require_once "User.php";
require_once "Time.php";

$user = new User("Семён", "kakoiTo@mail");
print_r($user);
$user->addTask("Описание задачи 1");
print_r($user->getTasks());
$user->setSex("male");
$user->addTask("Описание задачи 2");


print_r($user);
print_r($user->getTasks()[1]);
sleep(5);
$user->getTasks()[1]->setPriority(2);
print_r($user->getTasks()[1]);