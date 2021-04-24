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
            if (password_verify($password,$user->password)) {
                return $user;
            }
        }
        return false;
    }

    public function register($email, $login, $password)
    {
        $cheklogin = $this->pdo->prepare("SELECT * FROM users WHERE login = ?");
        $cheklogin->execute(array($login));
        $cheklogin=$cheklogin->fetch();


        if(!$cheklogin){
            $stmt = $this->pdo->prepare("INSERT INTO users (email, login, password) values(:email,:login,:password)");

            $stmt->execute([
                "email" => $email,
                "login" => $login,
                "password" => password_hash($password, PASSWORD_DEFAULT),
            ]);
            return true;
        }
        else
            {
            return false;
        }

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