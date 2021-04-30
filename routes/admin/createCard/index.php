<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
//$flatEl=[
//    "Livingroom"=>"Зал",
//    "Bedroom"=>"Спальная комната",
//    "Kitchen"=>"Кухня",
//    "Bathroom"=>"Ванная комната",
//    "Loggia"=>"Лоджия",
//    "Balcony"=>"Балкон",
//];
$validFileTypes = ['image/png', 'image/jpeg'];
$errors = '';
$maxSize = 2400000;
$imageNames = [];
$uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/resource/img/";
//$file = $_FILES["loadImg"];

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
        else{
//            $dataCard->insertCard($_POST["district"], $_POST["street"], $_POST["house"],
//                $_POST["house_type"], $_POST["elevator"], $_POST["floor_number"],
//                $_POST["number_flat"], $_POST["flat_price"], $_POST["flat_descr"], $imageNames, $_POST["flat_structure"], $_POST["flat_square"]);
            header("Location:/");
        }


    }
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/admin/createCard/index.view.php";