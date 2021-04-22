<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

//$card = $dataCard->openCard($_GET["id"]);
//
//$cardImage = $dataCard->openCard($_GET["id"]);
$openCard = $dataCard->openCard($_GET["id"]);
//var_dump($openCard);














require $_SERVER["DOCUMENT_ROOT"] . "/routes/open_card/index.view.php";