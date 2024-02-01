<?php
class UserProvider 
{
    // private array
    private PDO $pdo;
    function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    function registerUser(User $user, string $pass): bool {
        
        {// проверка иключений
            // смотрю есть ли пользователь с таким логином
            $statement = $this->pdo->prepare("SELECT * FROM `users` WHERE login LIKE :login");
            $login = $user->getLogin();
            $statement->execute(["login" => $login]);
            if ($statement->fetch())
            {
                throw new Exception ("Login кем-то занят");
            }

            if (is_numeric($user->getUserName()[0]) ){
                throw new Exception("Имя не должно начинаться с цифры");
            }

            if (mb_strlen($login) > 3){
                throw new LengthException("Логин не должен превышать 3 символа");
            }
        }

        $statement = $this->pdo->prepare("INSERT INTO `users` (`login`, `password`, `userName`, `createDate`) 
                                          VALUES (:login, :password, :userName, :date)");
        
        return $statement->execute([
                             'login' => $login,
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