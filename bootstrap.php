<?php

use App\config;
use App\config\Connect;
use App\models\Auth;

include $_SERVER["DOCUMENT_ROOT"] . "/config/config.php";
include $_SERVER["DOCUMENT_ROOT"] . "/config/Connect.php";
include $_SERVER["DOCUMENT_ROOT"] . "/app/models/Auth.php";


$pdo = Connect::makeConnection(CONN);

$dataAuth = new Auth($pdo);


