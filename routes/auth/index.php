<?php
require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(isset($_POST["form_auth_submit"])){
    $dataAuth->auth($_POST["auth_login"],$_POST["auth_pass"]);
}

require $_SERVER["DOCUMENT_ROOT"]."/routes/auth/index.view.php";