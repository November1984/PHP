<?php
class UserProvider 
{
    // private array
    private PDO $pdo;
    function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    function registerUser(User $user, string $pass): bool {
        
        {// смотрю есть ли пользователь с таким логином
        $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE login LIKE :login");
        if ($statement->execute(["login" => $user->getLogin()]))
        {
            throw new Exception ("Login кем-то занят");
        }
        }

        $statement = $this->pdo->prepare("INSERT INTO `users` (`login`, `password`, `userName`, `createDate`) 
                                          VALUES (:login, :password, :userName, :date)");
        
        return $statement->execute([
                             'login' => $user->getLogin(),
                             'password' => password_hash($pass, PASSWORD_DEFAULT),
                             'userName' => $user->getUserName(),
                             'date' => date("d.m.Y H:m:s")
                             ]);
    }
    function getUserNameByNameAndPassword (string $userLogin, string $password): ?User
    { // проверяет логин и пароль, возвращает имя пользователя или null
        $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE login LIKE :userLogin");
        $statement->execute(["userLogin" => $userLogin]);
        // $statement->execute(["userName" => htmlspecialchars(strip_tags($userName))]);

        return ($userPass = $statement->fetch()) 
               && password_verify($password, $userPass['password'])
               ? new User($userPass['userName'], $userPass['login']) 
               : null;
    }

}