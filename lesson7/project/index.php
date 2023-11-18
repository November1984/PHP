<?php

$pdo = new PDO ("sqlite:database.db");//, null, null, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
// var_dump ($pdo);
// $statement = $pdo->query("SELECT * FROM `students`");
// var_dump ($statement->fetchAll());
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

// $statement = $pdo->prepare("SELECT * FROM `students` WHERE `name` LIKE :name");
// $statement->execute(['name' => "%Иванов%"]);
// $students = $statement->fetch() ;
// var_dump($students['name']);

// $statement = $pdo->prepare("SELECT * FROM `students` WHERE `name` LIKE ?");
// $statement->execute(['%Иванов%']);
// $studentData = $statement->fetchAll();
// print_r($studentData);
// foreach ($studentData as $student){
//     echo $student['id'].' = '.$student['name'].PHP_EOL;
// }

// $statement= $pdo->prepare("SELECT `name` FROM `students` WHERE `name` LIKE ?");
// $statement->execute(['%Иванов%']);
// $studentData = $statement->fetchColumn(0);
// echo $studentData.PHP_EOL;
// $studentData = $statement->fetch()[0];
// echo $studentData;

// class Student {
//     // private int $id;
//     private string $name;

//     function getId(): int{
//         return $this->id; // Пока нет, но есть в базе данных, поэтому появится при создании экземпляра класса
//     }
//     function getName(): string{
//         return $this->name;
//     }
// }

// $statement=$pdo->query("SELECT * FROM `students` WHERE `id`=1");
// // $student = $statement->fetchObject('Student');
// $student = $statement->fetchObject(Student::class);
// echo $student->id.PHP_EOL;
// var_dump($student);

// Реализация сохранения...
// Реализация созранения в классе
// class Student {
//     private int $id;
//     private string $name;
//     function getId():int{
//         return $this->id;
//     }
//     function getName():string{
//         return $this->name;
//     }
//     function setName(string $name) {
//         $this->name = $name;
//     }
//     function insert(PDO $pdo): bool {
//         $statement = $pdo->prepare("INSERT INTO `students` (`name`) VALUES (?)");
//         return $statement->execute([$this->getName()]);
//     }
// }

// $student = new Student();
// $student->setName("demoName");
// if ($student->insert($pdo)) {
//        echo "Good";
//     }
// else {
//         echo "Bad";
//     }


// Второй вариант, операции с БД выполняет отдельный класс

// class Student {
//         private int $id;
//         private string $name;
    
//         function getId(): int{
//             return $this->id;
//         }
//         function getName(): string{
//             return $this->name;
//         }
//         function setName(string $name){
//             $this->name = $name;
//         }
//     }
// class StudentRepository {
//     private PDO $pdo;
//     function __construct(PDO $pdo) {
//         $this->pdo = $pdo;
//     }
//     function getById(int $studentId): ?Student {
//         $statement = $this->pdo->prepare("SELECT * FROM `students` WHERE `id` = ?");
//         $statement->execute([$studentId]);
//         return $statement->fetchObject(Student::class) ?: null;
//     }

//     function getAll(): array{
//         $result = [];
//         $statement = $this->pdo->query("SELECT * FROM `students`");
//         while ($statement && $student = $statement->fetchObject(Student::class)) {
//             $result[] = $student;
//         }
//         return $result;
//     }

//     function insert(Student $student): bool {
//         $statement = $this->pdo->prepare("INSERT INTO `students` (`name`) VALUES (?)");
//         return $statement->execute([$student->getName()]);
//     }
// }


// $repository = new StudentRepository($pdo);

// $student = $repository->getById(1);
// print_r($student);
// $allStudents = $repository->getAll();
// print_r($allStudents);

// $newStudent = new Student();
// $newStudent->setName("Nikol");
// $repository->insert($newStudent);