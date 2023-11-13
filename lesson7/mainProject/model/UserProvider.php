<?php
class UserProvider 
{
    // private array
    private PDO $pdo;
    function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    function registerUser(User $user, string $pass): bool {
        $statement = $this->pdo->prepare("INSERT INTO `users` (`login`, `password`, `userName`, `createDate`) 
                                          VALUES (:login, :password, :userName, :date)");
        
        return $statement->execute([
                             'login' => $user->getLogin(),
                             'password' => password_hash($pass, PASSWORD_DEFAULT),
                             'userName' => $user->getUserName(),
                             'date' => date("d.m.Y H:m:s")
                             ]);
    }
    function getUserNameByNameAndPassword (string $userName, string $password): ?User
    { // проверяет логин и пароль, возвращает имя пользователя или null
        $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE login LIKE :userName");
        $statement->execute(["userName" => $userName]);

        return ($userPass = $statement->fetch()) 
               && password_verify($password, $userPass['password'])
               ? new User($userName) 
               : null;
    }

}