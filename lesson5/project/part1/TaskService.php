<?php

class TaskService
{
    static function  addComment(User $user, Task $task, string $text): void
    {
        $comment = new Comment($user, $task, $text);
        
        // (string) $user->getUserName()." в ". Time::getTime() . 
        //             " сказал: ". $text;

        $task->setComments($comment);
    }
}