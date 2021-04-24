<?php
use App\models\Validator;

$errors = "";
require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if (isset($_POST["form_reg_submit"])) {
    unset($_SESSION["errors"]["register"]);
    $login = Validator::preProccessing($_POST["reg_login"]);
    $email = Validator::preProccessing($_POST["reg_email"]);
    $password = Validator::preProccessing($_POST["reg_pass"]);
    if (Validator::validLength("Логин", $login, "login") &
        Validator::validLength("Емаил", $email, "email") &
        Validator::validLength("Пароль", $password, "password")) {
        $regStatus = $dataAuth->register($_POST["reg_email"], $_POST["reg_login"], $_POST["reg_pass"]);
        if ($regStatus) {
            header("Location: /");

        }
        else{
            $errors = "Ошибка регистрации, данный логин занят!";
        }
    }
    else {
        $errors = "Попытка зарегестрироваться в системе закончилась неудачей";
    }


}
require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/register/index.view.php";
