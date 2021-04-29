<?php

use App\models\Validator;
require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if($_GET["out"]){
//    unset($_SESSION["user"]);
    unset($_SESSION["auth"]);
    unset($_SESSION["role"]);
    session_destroy();
}

if (isset($_POST["form_auth_submit"])) {
    $login = Validator::preProccessing($_POST["auth_login"]);
    $password = Validator::preProccessing($_POST["auth_pass"]);
    $user = $dataAuth->auth($login, $password);
    $admin = $dataAuth->admin($login);;
    if ($user) {
        foreach ($admin as $item){
            if($item->login ==$login){
                $_SESSION["role"] = true;
            }
        }
        $_SESSION["auth"] = true;
        header("Location: /");
    } else {
        $_SESSION["errors"]["auth"] = "Неправильный логин или пароль!";
        $_SESSION["login"] = $login;
    }

}

require $_SERVER["DOCUMENT_ROOT"] . "/routes/auth/index.view.php";