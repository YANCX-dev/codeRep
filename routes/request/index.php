<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if ($_SESSION["auth"] == false) {
    header("Location:/routes/register/index.php");
} else {

    if (isset($_POST["flat_id"])) {
        $_SESSION['flat_id'] = $_POST["flat_id"];
    }
    if (isset($_POST['submit_form'])) {
        $fullname = $_POST["user-fullname"];
        $userphone = $_POST["user-phone"];
        $useremail = $_POST["user-email"];
        $suggestions = $_POST["user-suggest"];
        if(isset($_SESSION['flat_id'])){
            $send = $sendRequest->sendRequest($_SESSION['flat_id'], $fullname, $userphone, $useremail,$suggestions);
            header("Location:./routes/  ");
            unset($_SESSION["flat_id"]);
        }

    }
}


require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/request/index.view.php";
