<?php
require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if($_SESSION["auth"] == false){
    header("Location: /routes/register/index.php");
}


require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/admin/index.view.php";