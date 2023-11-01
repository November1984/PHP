<?php

$pdo = new PDO ("sqlite:database.db");

$studentName = "Иванов Иван'";
$statement = $pdo->prepare('INSERT INTO `students` (`name`) VALUES (?)'); 
$result = $statement->execute((array) [$studentName]);
var_dump($result);