<?php


namespace App\models;


class InsertCard
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function insertCard($houseId,$descrip,$apartNumber,$price,$square,$flatEl,$images)
    {


        $flatInf = $this->pdo->prepare("INSERT INTO flat
        (house_id,descr,apartment_number,price,square) values (:house_id,:descr,:apartment_number,:price,:square)");

        $flatInf->execute([
            ":house_id" => $houseId,
            ":descr" => $descrip,
            ":apartment_number" => $apartNumber,
            ":price" => $price,
            ":square" => $square,
        ]);

        $flatId = $this->pdo->lastInsertId();
        foreach ($flatEl as $i) {
            $flatStructure = $this->pdo->prepare("INSERT INTO flat_structure
            (flat_id,element_name) values (:flat_id,:element_name)");

            $flatStructure->execute([
                ":flat_id" => $flatId,
                ":element_name" => $i,
            ]);
        }


        foreach ($images as $image) {
            $insertImage = $this->pdo->prepare("INSERT INTO images(image_name,flat_id) values (:image,:flat_id) ");

            $insertImage->execute([
                "image" => $image,
                "flat_id" => $flatId,
            ]);
        }

    }

    public function image($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM images where flat_id=:id");
        $stmt->execute([
            "id" => $id
        ]);

        return $stmt->fetch();
    }


    public function getFlats()
    {

        $cardAddres = $this->pdo->query("SELECT f.id, f.house_id, f.descr, f.apartment_number,
        f.price, f.status,f.square,
        h.house_number, s.street_name
        FROM flat f INNER JOIN house h ON f.house_id = h.id
        INNER JOIN street s ON h.street_id = s.id");

        return $cardAddres->fetchAll();
    }


    public function showFlat($id)
    {
        $openCard = $this->pdo->prepare("SELECT f.*, h.house_number, s.street_name, d.district_name,ht.type,fs.element_name
            FROM flat f INNER JOIN house h ON f.house_id = h.id
            INNER JOIN street s on h.street_id = s.id
            INNER JOIN district d on s.district_id = d.id
            INNER JOIN house_type ht on h.type_id = ht.id
            INNER JOIN flat_structure fs on f.id = fs.flat_id
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

    public function getFlatElement($flat_id)
    {
        $flatElement = $this->pdo->prepare("SELECT * FROM flat_structure WHERE flat_id=:id");

        $flatElement->execute([
            ":id" => $flat_id
        ]);

        return $flatElement->fetchAll();

    }

    public function getFlatInfo()
    {
        $stmt = $this->pdo->query("SELECT
        d.id as dist_id,d.district_name,s.street_name,s.id as str_id,ht.type,h.house_number,h.id as house_id
        FROM district d INNER JOIN street s on d.id = s.district_id
        INNER JOIN house h on s.id = h.street_id INNER JOIN
        house_type ht on h.type_id = ht.id");

        return $stmt->fetchAll();

    }
    public function getDist(){
        $stmt = $this->pdo->query("SELECT * FROM district");

        return $stmt->fetchAll();
    }
    public function getStreet(){
        $stmt = $this->pdo->query("SELECT * FROM street");


        return $stmt->fetchAll();
    }
    public function insertDist($distName){
        $stmt = $this->pdo->prepare("INSERT INTO district (district_name) values (:district_name)");

        $stmt->execute([
           "district_name"=>$distName,
        ]);
    }
        public function insertStreet($distId,$streetName){
        $stmt = $this->pdo->prepare("INSERT INTO street (street_name, district_id) values (:street_name,:district_id)");

        $stmt->execute([
            "street_name"=>$streetName,
            "district_id"=>$distId,
        ]);
    }
    public function insertHouseNum($streetId,$houseNum,$typeId,$floor,$elevator){
        $stmt = $this->pdo->prepare("INSERT INTO house(street_id, house_number,type_id,floor,elevator) values (:street_id,:house_number,:type_id,:floor,:elevator)");

        $stmt->execute([
           "street_id"=>$streetId,
           "house_number"=>$houseNum,
            "type_id"=>$typeId,
            "floor"=>$floor,
            "elevator"=>$elevator
        ]);
    }
    public function insertTypeInfo($type){
        $stmt = $this->pdo->prepare("INSERT INTO
        house_type(type) values (:type)");

        $stmt->execute([
            "type"=>$type,
        ]);
    }
    public function getTypes(){
        $stmt = $this->pdo->query("SELECT * FROM house_type");

        return $stmt->fetchAll();

    }
    public function getHousesNum($streetId){
        $stmt = $this->pdo->prepare("SELECT * FROM house WHERE street_id=:id");

        $stmt->execute([
            "id"=>$streetId,
        ]);

        return $stmt->fetchAll();
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