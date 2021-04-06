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

    public function auth($email,$password){
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute([
           "email"=>$email
        ]);
        $user=$stmt->fetch();
        if($user){
            if($password==$user->password){
                return $user;
            }
        }
        return false;

    }
    public function register($email,$login,$password){
        if($this->auth($login,$password)){
            return -1;
        }
        $stmt = $this->pdo->prepare("INSERT INTO users (email, login, password) values(:email,:login,:password)");

        $stmt->execute([
           "email"=>$email,
           "login"=>$login,
           "password"=>password_hash($password,PASSWORD_DEFAULT),
        ]);
        return $this->pdo->lastInsertId();
    }

}