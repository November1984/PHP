<?php

$pdo = new PDO ("sqlite:database.db", null, null, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

// $studentName = "Иванов Иван'";
// $statement = $pdo->prepare('INSERT INTO `students` (`name`) VALUES (?)'); 
// $result = $statement->execute((array) [$studentName]);
// var_dump($result);

// $statement = $pdo->prepare('SELECT * FROM `students` WHERE `name` LIKE ?');
// $statement->execute((array) ["%Иванов%"]);
// while ($statement && $studentData = $statement->fetch() ) {
//     echo $studentData['name'].PHP_EOL;
// }

// var_dump(($studentData = $statement->fetch() ));

// if ($statement !== false)
// {
//     foreach ($statement as $studentData) {
//         echo $studentData['name'].PHP_EOL;
//     }
// }

// $statement = $pdo->prepare ("SELECT * FROM `students` WHERE `id` = ?");
// $statement->execute ([1]);
// $studentData = $statement->fetch(PDO::FETCH_ASSOC);
// print_r($studentData);

$statement = $pdo->prepare("SELECT * FROM `students` WHERE `name` LIKE :name");
$statement->execute(['name' => "%Иванов%"]);
$students = $statement->fetch() ;
var_dump($students['name']);