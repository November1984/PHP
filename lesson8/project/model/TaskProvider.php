<?php

Class TaskProvider{
    // private array $tasks;
    private PDO $pdo;
    // private int $undoneTasksCount = 0;
    function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    
    function getUndoneList(string $userName): ?array {
        /* Возвращаю список невыполненных задач пользователя или null
        на входе имя пользователя
        */
        $statement = $this->pdo->query("SELECT * FROM tasks 
                                        WHERE userName LIKE '$userName'
                                        AND isDone = 0");
        // Что если пользователь изменит имя? -> переделать на userID 
        while ($arr = $statement->fetch()) { // можно использовать fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROP_LATE, Task::class) //41:49
            $tasks[] = new Task($userName,$arr["description"], $arr["id"]);
        }
        return $tasks ?? null;
    }

    function addTask(string $userName, string $description) {      
        if (empty($description))
        {return;}
        else{
            $statement = $this->pdo->prepare("INSERT INTO `tasks` (userName, description, isDone)
                                VALUES (:userName, :description, :done)");
            $statement->execute([
                "userName" => $userName,
                "description" => htmlspecialchars(strip_tags($description)), 
                "done" => 0
                ]);
        }
    }

    static function getTasksCount(string $userName): int {
        return isset($_SESSION[$userName]["tasks"]) ? count($_SESSION[$userName]["tasks"]) : 0;
    }

	function getUndoneTasksCount(string $userName): int {
        $statement = $this->pdo->query("SELECT COUNT(*) FROM tasks
                                        WHERE userName = '$userName'");
        return $statement ? (int) $statement->fetch() : 0;
	}
    function setTaskAsDone(int $taskID) {
        $statement = $this->pdo->prepare("UPDATE `tasks` SET `isDone` = 1 WHERE id = $taskID");
        $statement->execute();
    }
}