<?php

namespace App\models;

use PDO;

class Auth
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function auth($login, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE login=:login");
        $stmt->execute([
            "login" => $login
        ]);
        $user = $stmt->fetch();
        if ($user) {
            if ($password == $user->password) {
                return $user;
            }
        }
        return false;
    }

    public function register($email, $login, $password)
    {
        $cheklogin = $this->pdo->prepare("SELECT * FROM `users` WHERE `login` = ?");
        $cheklogin->execute(array($login));
        while ($row = $cheklogin->fetch(PDO::FETCH_LAZY)) {
            if ($row > 0) {
                $_SESSION["errors"]["register"] = "Логин занят";
//                return -1;
            }
        }
        if ($row == 0) {
            $stmt = $this->pdo->prepare("INSERT INTO users (email, login, password) values(:email,:login,:password)");

            $stmt->execute([
                "email" => $email,
                "login" => $login,
                "password" => password_hash($password, PASSWORD_DEFAULT),
            ]);
            return $this->pdo->lastInsertId();
        }
        return 1; //Тут хз поч я 1 вернул,просто требует ретерна я а не ебу что тут ретернить сука блять 
    }

    public
    function find($login)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE login=:login");
        $stmt->execute([
            "login" => $login,
        ]);
    }

}