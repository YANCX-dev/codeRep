<?php

use App\models\Validator;
use App\config;
use App\config\Connect;
use App\models\Auth;
use App\models\InsertCard;
use App\models\RequestForm;

include $_SERVER["DOCUMENT_ROOT"] . "/config/config.php";
include $_SERVER["DOCUMENT_ROOT"] . "/config/Connect.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Auth.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Validator.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/InsertCard.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/RequestForm.php";
//$user = isset($_SESSION['auth']) && $_SESSION['auth'] ? json_decode($_SESSION["user"]) : false;

$pdo = Connect::makeConnection(CONN);

$dataAuth = new Auth($pdo);
$dataCard = new InsertCard($pdo);
$form = new RequestForm($pdo);
$sendRequest = new RequestForm($pdo);

$flats = $dataCard->getFlats();



