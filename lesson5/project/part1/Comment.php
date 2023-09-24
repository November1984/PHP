<?php

class Comment
{
    private User $author;
    private Task $task;
    private string $text;


    function __construct(User $author, Task $task, string $text) {
        $this->setAuthor($author);
        $this->setTask($task);
        $this->setText($text);
    }
	public function getTask(): Task {
		return $this->task;
	}
	private function setTask(Task $task): void {
		$this->task = $task;
	}
	public function getAuthor(): User {
		return $this->author;
	}
	public function setAuthor(User $author): void {
		$this->author = $author;
	}
	public function getText(): string {
		return $this->text;
	}
	public function setText(string $text): void{
		$this->text = $text;
	}
}
