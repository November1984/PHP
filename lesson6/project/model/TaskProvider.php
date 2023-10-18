<?php

Class TaskProvider{
    private array $tasks;
    private int $undoneTasksCount = 0;
    static function getUndoneList(string $userName): ?array {
        $res = [];

        if (isset($_SESSION[$userName]["tasks"])){
            foreach ($_SESSION[$userName]["tasks"] as $task) {
                if (!$task->getIsDone()) $res[] = $task;
            }
        }
        return isset($res) ? $res : null;
    }

    static function addTask(string $userName, string $description, int $taskID) {
        if (empty($description))
        {return;}
        else{
            $_SESSION[$userName]["tasks"][$taskID] = new Task($userName,$description);
        }
    }

    static function getTasksCount(string $userName): int {
        return isset($_SESSION[$userName]["tasks"]) ? count($_SESSION[$userName]["tasks"]) : 0;
    }

	static function getUndoneTasksCount(string $userName): int {
		return count(self::getUndoneList($userName));
	}
}