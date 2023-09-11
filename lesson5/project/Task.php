<?php

class Task 
{
    private string $description;
    private string $dateCreated;
    private string $dateUpdated;
    private string $dateDone;
    private ?int $priority;
    private bool $isDone;
    private string $user;
    private array $comments = [];

    function __construct(string $userName, string $description)
    {
        $this->user = $userName;
        $this->description = $description;
        $this->priority = null;
        $this->dateCreated = Time::getTime();
        $this->taskUpdate();
        $this->isDone = false;
    }
    private function taskUpdate(): void
    {
        $this->dateUpdated = Time::getTime();
    }
    function setDescription(string $description): void
    {
        $this->description = $description;
        $this->taskUpdate();
    }
    function getDescription(): string
    {
        return $this->description;
    }
    function setPriority(int $priority): void
    {
        $this->priority = $priority;
        $this->taskUpdate();
    }
    function getPriority(): ?int
    {
        return $this->priority;
    }
    function markAsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
        $this->taskUpdate();
        $this->dateDone = Time::getTime();
    }
    function getStatus(): string
    {
        return ($this->isDone) ? "Done" : "Isn't done";
    }
    function getComments(): array {
		return $this->comments;
	}
	function setComments(string $comment): void 
    {
		$this->comments[] = $comment;
	}
}