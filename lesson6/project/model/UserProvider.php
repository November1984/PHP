<?php
class UserProvider 
{
    // private array

    static function getUserNameByNameAndPassword (string $userName, string $password): ?User
    {
        $accounts = [
            'geek' => 'pass123',
            'gak' => '111',
            'admin' => '123',
        ];

        $expectedPassword = $accounts[$userName] ?? null;
        if ($expectedPassword === $password){
            return new User($userName);
        }
        return null;
    }
}