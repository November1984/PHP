<?php

$pdo = require "db.php"; 

$pdo->exec('CREATE TABLE users (
                                id          INTEGER      NOT NULL PRIMARY KEY AUTOINCREMENT,
                                userName    VARCHAR(255) NOT NULL,
                                login       VARCHAR(255) NOT NULL,
                                password    TEXT         NOT NULL, 
                                createDate  DATE         NOT NULL 
                                )'
                                );


$pdo -> exec ('CREATE TABLE tasks (
                id          INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
                description TEXT    NOT NULL,
                isDone      TINYINT NOT NULL,
                userName    VARCHAR(255) NOT NULL
                )
            ');

// $pdo -> exec ('ALTER TABLE tasks
//                 ADD userName VARCHAR(255) NOT NULL
//             ');

echo "make DB done ";