<?php

Class Task {
    private int $id;
    private bool $isDone = false;
    private ?string $description;
    private ?string $userName;

    function __construct(string $userName=null, string $description=null, int $taskID=0){
        $this->description = $description;
        $this->userName = $userName;
        $this->id = $taskID;
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
		return $this->id;
	}
    public function setTaskID(int $taskID) {
        $this->id = $taskID;
    }
}