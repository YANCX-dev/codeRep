<?php

namespace App\config;

use PDO;

class Connect
{
    public static function makeConnection($conn)
    {

        return new PDO(
            "mysql:host=" . $conn["host"] . ";dbname=" . $conn["dbname"],
            $conn["login"],
            $conn["password"]);
    }

}