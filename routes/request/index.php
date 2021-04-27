<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";


if ($_SESSION["auth"] == false) {
    header("Location:/routes/register/index.php");
} else {
    var_dump($_POST);
    if (isset($_POST["flat_id"])) {
        $_SESSION['flat_id'] = $_POST["flat_id"];
    }
    var_dump($_SESSION);
    if (isset($_POST['submit_form'])) {
        $fullname = $_POST["user-fullname"];
        $userphone = $_POST["user-phone"];
        $useremail = $_POST["user-email"];
        echo "*************";
        var_dump($_POST);
        echo "--------------";
        if(isset($_SESSION['flat_id'])){
            $send = $sendRequest->sendRequest($_SESSION['flat_id'], $fullname, $userphone, $useremail);
        }

    }
}


require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/request/index.view.php";
