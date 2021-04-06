<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/routes/register/index.view.php";
require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_POST["form_reg_submit"])){
    $dataAuth->register($_POST["reg_email"],$_POST["reg_login"],$_POST["reg_pass"]);
}
