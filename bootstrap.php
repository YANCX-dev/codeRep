<?php
use App\models\Validator;
use App\config;
use App\config\Connect;
use App\models\Auth;
use App\models\InsertCard;

include $_SERVER["DOCUMENT_ROOT"] . "/config/config.php";
include $_SERVER["DOCUMENT_ROOT"] . "/config/Connect.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Auth.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Validator.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/InsertCard.php";

//$user = isset($_SESSION['auth']) && $_SESSION['auth'] ? json_decode($_SESSION["user"]) : false;

$pdo = Connect::makeConnection(CONN);

$dataAuth = new Auth($pdo);
$dataCard = new InsertCard($pdo);
$cardDb = $dataCard->getCardInfo();

