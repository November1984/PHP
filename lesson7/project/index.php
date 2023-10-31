<?php

$pdo = new PDO ("sqlite:database.db");

$studentName = "Иванов Иван";
$affectedCount = $pdo->exec("INSERT INTO `students` (`name`) VALUES ('$studentName')");
var_dump($affectedCount); 


