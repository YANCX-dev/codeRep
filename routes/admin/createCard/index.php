<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$validFileTypes = ['image/png', 'image/jpeg'];
$errors = '';
$maxSize = 2400000;
$imageNames = [];
$uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/resource/img/";


if ($_SESSION["auth"] == false) {

    header("Location:/routes/register/index.php");
}
elseif ($_SESSION["role"] == false){
        header("Location:/");
}
else {
    if (isset($_POST['submit_form'])) {
        foreach ($_FILES['loadImg']['error'] as $key => $error) {
            $name = time() . $_FILES['loadImg']['name'][$key];
            $tmpName = $_FILES['loadImg']['tmp_name'][$key];
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $filecount = count($_FILES["loadImg"]["name"]);
            $imageNames[] = $name;
            $type = finfo_file($fileInfo, $tmpName);
            if ($error == UPLOAD_ERR_OK) {
                if ($_FILES["loadImg"]["size"][$key] > $maxSize) {
                    $errors = "Ошибка загрузки файлов!Файл слишком большой!";
                } else {
                    if (in_array($type, $validFileTypes)) {
                        if (!move_uploaded_file($tmpName, $uploadDir . $name)) {
                            $errors = "Не удалось загрузить изображение";
                        } else {
                            $errors = "Расширение файла должно быть PNG или JPEG";
                        }
                    }

                }
            }
            finfo_close($fileInfo);
        }
        if($filecount < 4){
        $errors = "Ошибка загрузки файлов!Минимальное количество файлов - 4!";
         }
        elseif ($filecount > 4){
            $errors="Ошибка загрузки файлов!Максимально количество файлов - 4!";
        }
        else{
            $dataCard->insertCard($_POST["house"],$_POST["flat_descr"],$_POST["number_flat"],$_POST["flat_price"],$_POST["flat_square"],$_POST["flat_structure"],$imageNames);
//            header("Location:/");
        }

    }
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/admin/createCard/index.view.php";