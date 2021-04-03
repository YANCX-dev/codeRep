<?php

use App\config\Connect;

include $_SERVER["DOCUMENT_ROOT"] . "/config/config.php";
include $_SERVER["DOCUMENT_ROOT"] . "/config/Connect.php";




$conn = Connect::makeConnection(CONN);
