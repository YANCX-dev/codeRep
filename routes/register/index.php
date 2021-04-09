<?php

use App\models\Validator;


require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
if (isset($_POST["form_reg_submit"])) {
    unset($_SESSION["errors"]["register"]);
    $login = Validator::preProccessing($_POST["reg_login"]);
    $email = Validator::preProccessing($_POST["reg_email"]);
    $password = Validator::preProccessing($_POST["reg_pass"]);
    if (Validator::validLength("Логин", $login, "login") &
        Validator::validLength("Емаил", $email, "email") &
        Validator::validLength("Пароль", $password, "password")) {
        $id = $dataAuth->register($_POST["reg_email"], $_POST["reg_login"], $_POST["reg_pass"]);
        if ($id == -1) {
            $_SESSION["errors"]["register"] = "Пользовтель с такими данными уже зарегестрирован!";
        } else if ($id > 0) {
            $_SESSION["user"] = json_encode($dataAuth->find($id), JSON_UNESCAPED_UNICODE);
            $_SESSION["auth"] = true;
            header("Location: /");
        } else {
            $_SESSION["errors"]["register"] = "Попытка зарегестрироваться в системе закончилась неудачей";
        }
    }

}
require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/register/index.view.php";
