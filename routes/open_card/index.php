<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$card = $dataCard->openCard($_GET["id"]);

$cardImage = $dataCard->getImage($_GET["id"]);
var_dump($cardImage);














require $_SERVER["DOCUMENT_ROOT"] . "/routes/open_card/index.view.php";