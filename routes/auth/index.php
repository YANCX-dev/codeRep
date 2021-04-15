<?php
use App\models\Validator;
require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if(isset($_POST["form_auth_submit"])){
    $login = Validator::preProccessing($_POST["auth_login"]);
    $password = Validator::preProccessing($_POST["auth_pass"]);
    $user =$dataAuth->auth($_POST["auth_login"],$_POST["auth_pass"]);
    var_dump($user);
    if($user){
        $_SESSION["user"] = json_encode($user,JSON_UNESCAPED_UNICODE);
        $_SESSION["auth"] = true;
        header("Location: /");
    }
    else
    {
        $_SESSION["errors"]["auth"] = "Неправильный логин или пароль!";
        $_SESSION["login"]=$login;
        header("Location: /routes/auth/index.php");
    }

}

require $_SERVER["DOCUMENT_ROOT"]."/routes/auth/index.view.php";