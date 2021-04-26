<?php


namespace App\models;


class Form
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    public function getHouseType(){
        $stmt = $this->pdo->query("SELECT h.type FROM house_type h");

        return $stmt->fetchAll();
    }
}