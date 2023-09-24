<?php

class Task 
{
    private string $description;
    private DateTime $dateCreated;
    private DateTime $dateUpdated;
    private DateTime $dateDone;
    private ?int $priority;
    private bool $isDone = false;
    private User $user;
    private array $comments = [];

    function __construct(User $user, string $description, int $priority = 1)
    {
        $this->user = $user;
        $this->setDescription($description);
        $this->priority = $priority;
        $this->setDateCreated();
        $this->taskUpdate();
        // $this->isDone = false;
    }
    private function taskUpdate(): void
    {
        $this->dateUpdated = new DateTime ("now", new DateTimeZone("Europe/Moscow"));;
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
        $this->dateDone = new DateTime ("now", new DateTimeZone("Europe/Moscow"));
    }
    function getStatus(): string
    {
        return ($this->isDone) ? "Done" : "Isn't done";
    }
    function getComments(): array {
		return $this->comments;
	}
	function setComments(Comment $comment): void 
    {
		$this->comments[] = $comment;
	}
	function getDateCreated(): DateTime {
        return $this->dateCreated;
	}
	private function setDateCreated(): void {
        $this->dateCreated = new DateTime ("now", new DateTimeZone("Europe/Moscow"));
	}
}