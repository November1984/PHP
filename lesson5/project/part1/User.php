<?php

class User
{
    private string $userName;
    private string $email;
    private ?string $sex;
    private ?int $age;
    private bool $isActive = true;
    private DateTime $dateCreated;
    // public Task $tasks;

    function __construct(string $userName, string $email)
    {
        $this->userName = $userName;
        $this->email = $email;
        $this->dateCreated = new DateTime ("now", new DateTimeZone("Europe/Moscow"));
    }

    function getUserName(): string
    {
        return $this->userName ?? "unknown";
    }
    function getSex(): string 
    {
        return $this->sex;
    }
    function setSex(string $sex): void
    {
        $this->sex = $sex;
    }
    function getAge(): int
    {
        return $this->age;
    }
    function setAge($age): void
    {
        $this->age = $this->checkAge($age);
    }
    private function checkAge($age): ?int
    {
        if ($age > 0 && $age < 125)
        {
            return $age;
        }
        elseif ($age < 0 && $age >= 125)
        {
            echo "Не тот возраст." . PHP_EOL;
        }
        return null;
    }
    function getActive(): bool
    {
        return $this->isActive;
    }
    function setActive(bool $isActive): void
    {
        $this->isActive = $isActive;
    }

    // function addTask($description):void
    // {
    //     $this->tasks[] = new Task($this, $description);
    // }
    // function getTasks(): array
    // {
    //     return $this->tasks;
    // }
}