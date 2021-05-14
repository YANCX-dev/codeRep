<?php


namespace App\models;


class RequestForm
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo=$pdo;
    }

    /**
     * @param $flat_id
     * @param $full_name
     * @param $phone
     * @param $email
     * @param $suggestions
     */
     /** Отправка заявки в базу данных */
    public function sendRequest($flat_id,$full_name,$phone,$email,$suggestions){
        $stmt = $this->pdo->prepare("INSERT INTO request (full_name, phone, email,suggestions) values (:full_name,:phone,:email,:suggestions)");

        $stmt->execute([
            ":full_name"=>$full_name,
            ":phone"=>$phone,
            ":email"=>$email,
            ":suggestions"=>$suggestions,
        ]);

        $order_id = $this->pdo->lastInsertId();


        $flat= $this->pdo->prepare("INSERT INTO order_list (request_id, flat_id) 
                                    values (:request_id,:flat_id)");

        $flat->execute([
            "request_id"=>$order_id,
            "flat_id"=>$flat_id,
        ]);

    }
}