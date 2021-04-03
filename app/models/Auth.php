<?php

namespace App\models;

use PDO;

class Auth
{
    private $pdo;

    public function __construct()
    {
        $this->pdo;
    }

    public function auth($login,$password){
        $stmt = $this->pdo->prepare("SELECT * FROM admins WHERE login=:login");
        $stmt->execute([
           "login"=>$login
        ]);
        $user=$stmt->fetch();
        if($user){
            if($password==$user->password){
                return $user;
            }
        }
        return false;

    }
}