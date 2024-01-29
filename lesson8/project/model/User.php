<?php
class User 
{
    private ?string $userName;
    private ?string $login;
    public function __construct(string $userName=null, string $login=null)
    {
        $this -> userName = $userName;
        $this -> login = $login;
    }
    public function getUserName(): string
    {
        return $this->userName;
    }
    public function setLogin(string $login): void{
        $this -> login = $login;
    }
    public function getLogin(): string{
        return $this -> login ?? "not set";
    }
}
