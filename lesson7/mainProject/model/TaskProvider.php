<?php

Class TaskProvider{
    private array $tasks;
    private PDO $pdo;
    private int $undoneTasksCount = 0;
    function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
    function getUndoneList(string $userName): ?array {
        $statement = $this->pdo->query("SELECT * FROM tasks 
                                        WHERE userName LIKE '$userName'
                                        AND isDone = 0");
<<<<<<< Updated upstream
        // var_dump($statement->fetchAll());
        return $statement ? $statement->fetchAll() : null;
=======
        // Что если пользователь изменит имя? -> переделать на userID 
        while ($arr = $statement->fetch()) { // можно использовать fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROP_LATE, Task::class) //41:49
            $tasks[] = new Task($userName,$arr["description"], $arr["id"]);
        }
        return $tasks ?? null;
>>>>>>> Stashed changes
    }

    function addTask(string $userName, string $description) {      
        var_dump($description);
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
            // $_SESSION[$userName]["tasks"][$taskID] = new Task($userName,$description);
        }
    }

    static function getTasksCount(string $userName): int {
        return isset($_SESSION[$userName]["tasks"]) ? count($_SESSION[$userName]["tasks"]) : 0;
    }

	function getUndoneTasksCount(string $userName): int {
        $statement = $this->pdo->query("SELECT COUNT(*) FROM tasks
                                        WHERE userName = '$userName'");
        // var_dump($statement, $userName, $statement->fetch());
        return $statement ? (int) $statement->fetch() : 0;
        // return count(self::getUndoneList($userName));
	}
}