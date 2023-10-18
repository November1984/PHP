<?php

Class Task {
    private int $taskID;
    private bool $isDone = false;
    private string $description;

    function __construct(string $userName, string $description){
        $this->description = $description;
        $this->taskID = TaskProvider::getTasksCount($userName);
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
}