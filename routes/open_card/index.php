<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$flat = $dataCard->showFlat($_GET["id"]);
$imagesForFlat = $dataCard->getFlatImages($_GET["id"]);
$flatEl = $dataCard->getFlatElement($_GET["id"]);

$styles = ["top-left", "bottom-right", "bottom-left", "top-right"];

require $_SERVER["DOCUMENT_ROOT"] . "/routes/open_card/index.view.php";