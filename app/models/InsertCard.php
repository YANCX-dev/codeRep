<?php


namespace App\models;


class InsertCard
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertCard($district, $street, $house, $house_type, $elevator, $floor_number, $number_flat, $price, $flat_descr, $image_name, $path)
    {

        $newDist = $this->pdo->prepare("INSERT INTO district (district_name) value (:district)");

        $newDist->execute([
            "district" => $district,
        ]);
        $distId = $this->pdo->lastInsertId();

        $newStreet = $this->pdo->prepare("INSERT INTO street (district_id,street_name) values (:district_id,:street)");

        $newStreet->execute([
            ":district_id" => $distId,
            ":street" => $street,
        ]);
        $streetId = $this->pdo->lastInsertId();

        $insertType = $this->pdo->prepare("INSERT INTO house_type (floor, elevator,type) values (:floor,:elevator,:type)");

        $insertType->execute([
            "floor" => $floor_number,
            "elevator" => $elevator,
            "type" => $house_type,
        ]);
        $type_id = $this->pdo->lastInsertId();

        $newHouse = $this->pdo->prepare("INSERT INTO house (street_id,house_number,type_id) values (:street_id,:house,:type_id)");

        $newHouse->execute([
            ":street_id" => $streetId,
            ":house" => $house,
            ":type_id" => $type_id,
        ]);
        $houseId = $this->pdo->lastInsertId();


        $flatInf = $this->pdo->prepare("INSERT INTO flat (house_id,descr,apartment_number,price) values (:house_id,:descr,:apartment_number,:price)");

        $flatInf->execute([
            "house_id" => $houseId,
            "descr" => $flat_descr,
            "apartment_number" => $number_flat,
            "price" => $price,
        ]);
        $flatId = $this->pdo->lastInsertId();

        $newImage = $this->pdo->prepare("INSERT INTO images (image_name, flat_id, path) values (:image_name,:flat_id,:path) ");

        $newImage->execute([
            "image_name" => $image_name,
            "flat_id" => $flatId,
            "path" => $path,
        ]);
    }

    public function getCardInfo()
    {

        $cardAddres = $this->pdo->query("SELECT * FROM flat f INNER JOIN house h ON f.house_id = h.id INNER JOIN street s on h.street_id = s.id");

        return $cardAddres->fetchAll();


    }


    public function openCard($id)
    {
        $openCard = $this->pdo->prepare("SELECT *
FROM flat f INNER JOIN house h ON f.house_id = h.id INNER JOIN house_type ht on h.type_id = ht.id INNER JOIN street s on h.street_id = s.id
WHERE f.id = :id");

        $openCard->execute([
            "id" => $id,
        ]);
        return $openCard->fetch();
    }
    public function getImage($id){
        $getImage = $this->pdo->prepare("SELECT * FROM images WHERE flat_id=:id");

        $getImage->execute([
            "id"=>$id
        ]);

       return $getImage->fetchAll();
    }
}