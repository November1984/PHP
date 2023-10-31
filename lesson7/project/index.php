<?php

$pdo = new PDO ("sqlite:database.db");

$query = 'CREATE TABLE `students`(
            id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,

            name VARCHAR (100) NOT NULL
        )';

$statement = $pdo->query($query);

var_dump($pdo->errorInfo());
