<?php


namespace App\models;


class InsertCard
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertCard($district, $street, $house, $house_type, $elevator, $floor_number, $number_flat, $price, $flat_descr, $image,$flatEl,$flatSquare)
    {

        $newDist = $this->pdo->prepare("INSERT INTO district (district_name) value (:district)");

        $newDist->execute([
            ":district" => $district,
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
            ":floor" => $floor_number,
            ":elevator" => $elevator,
            ":type" => $house_type,
        ]);
        $type_id = $this->pdo->lastInsertId();

        $newHouse = $this->pdo->prepare("INSERT INTO house (street_id,house_number,type_id) values (:street_id,:house,:type_id)");

        $newHouse->execute([
            ":street_id" => $streetId,
            ":house" => $house,
            ":type_id" => $type_id,
        ]);
        $houseId = $this->pdo->lastInsertId();


        $flatInf = $this->pdo->prepare("INSERT INTO flat
    (house_id,descr,apartment_number,price,square) values (:house_id,:descr,:apartment_number,:price,:square)");

        $flatInf->execute([
            ":house_id" => $houseId,
            ":descr" => $flat_descr,
            ":apartment_number" => $number_flat,
            ":price" => $price,
            ":square"=>$flatSquare,
        ]);

        $flatId = $this->pdo->lastInsertId();

            $flatStructure = $this->pdo->prepare("INSERT INTO flat_structure
            (flat_id,element_name) values (:flat_id,:element_name)");

            $flatStructure->execute([
                ":flat_id"=>$flatId,
                ":element_name"=>$flatEl,
            ]);


        foreach ($image as $i) {
            $insertImage = $this->pdo->prepare("INSERT INTO images(image_name,flat_id) values (:image,:flat_id) ");

            $insertImage->execute([
                "image" => $i,
                "flat_id" => $flatId,
            ]);
        }

    }
    public function image($id){
        $stmt = $this->pdo->prepare("SELECT * FROM images where flat_id=:id");
        $stmt->execute([
            "id"=>$id
        ]);

        return $stmt->fetch();
    }


    public function getFlats()
    {

        $cardAddres = $this->pdo->query("SELECT f.id, f.house_id, f.descr, f.apartment_number, 
                f.price, f.status,f.square, 
                h.house_number, s.street_name 
                FROM flat f INNER JOIN house h ON f.house_id = h.id 
                INNER JOIN street s on h.street_id = s.id");

        return $cardAddres->fetchAll();
    }


    public function showFlat($id)
    {
        $openCard = $this->pdo->prepare("SELECT f.*, h.house_number, s.street_name, d.district_name 
                FROM flat f INNER JOIN house h ON f.house_id = h.id 
                INNER JOIN street s on h.street_id = s.id 
                INNER JOIN district d on s.district_id = d.id 
                WHERE f.id=:id");

        $openCard->execute([
            "id" => $id,
        ]);
        return $openCard->fetch();
    }


    public function getFlatImages($flat_id)
    {
        $flatImage = $this->pdo->prepare("SELECT * FROM images WHERE flat_id =:id");

        $flatImage->execute([
            "id" => $flat_id,
        ]);

        return $flatImage->fetchAll();
    }

//    public function getImage($id){
//        $getImage = $this->pdo->prepare("SELECT * FROM images WHERE flat_id=:id");
//
//        $getImage->execute([
//            "id"=>$id
//        ]);
//
//       return $getImage->fetchAll();
//    }
}