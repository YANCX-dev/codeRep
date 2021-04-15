<?php


namespace App\models;


class InsertCard
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function insertCard($district,$street,$house,$house_type,$elevator,$floor_number,$number_flat,$price,$flat_descr){

        $newDist = $this->pdo->prepare("INSERT INTO district (district_name) value (:district)");

        $newDist->execute([
            "district"=>$district,
        ]);
        $distId = $this->pdo->lastInsertId();

        $newStreet = $this->pdo->prepare("INSERT INTO street (district_id,street_name) values (:district_id,:street)");

        $newStreet->execute([
            ":district_id"=>$distId,
            ":street"=>$street,
        ]);
        $streetId = $this->pdo->lastInsertId();

        $insertType = $this->pdo->prepare("INSERT INTO house_type (floor, elevator) values (:floor,:elevator)");

        $insertType->execute([
            "floor"=>$floor_number,
            "elevator"=>$elevator,
        ]);
        $type_id = $this->pdo->lastInsertId();

        $newHouse = $this->pdo->prepare("INSERT INTO house (street_id,house_number,type_id) values (:street_id,:house,:type_id)");

        $newHouse->execute([
            ":street_id"=>$streetId,
            ":house"=>$house,
            ":type_id"=>$type_id,
        ]);
        $houseId = $this->pdo->lastInsertId();


        $flatInf = $this->pdo->prepare("INSERT INTO flat (house_id,descr,apartment_number,price) values (:house_id,:descr,:apartment_number,:price)");

        $flatInf->execute([
            "house_id"=>$houseId,
            "descr"=>$flat_descr,
            "apartment_number"=>$number_flat,
            "price"=>$price,
        ]);


    }

}