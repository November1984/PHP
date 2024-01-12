<?php

Class Task {
    private int $taskID;
    private bool $isDone = false;
    private string $description;
    private string $ownerName;

    function __construct(string $userName, string $description, int $taskID=0){
        $this->description = $description;
        $this->ownerName = $userName;
        $this->taskID = $taskID;
        // $this->taskID = TaskProvider::getTasksCount($userName);
        // $this->isDone = false;
    }

	function setIsDone() {
		$this->isDone = true;
	}
    function getIsDone(): bool {
        return $this->isDone;
    }
	function getDescription(): string {
		return $this->description;
	}
	public function getTaskID(): int {
		return $this->taskID;
	}
    public function setTaskID(int $taskID) {
        $this->taskID = $taskID;
    }
}