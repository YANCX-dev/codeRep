<?php
require $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
$validFileTypes = ['image/png', 'image/jpeg'];
$errors = '';
$maxSize = 2400000;
$imageArr = array();
$uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/resource/img/";
//$file = $_FILES["loadImg"];
if (isset($_POST['submit_form'])) {
    foreach ($_FILES['loadImg']['error'] as $key => $error) {
        $name = $_FILES['loadImg']['name'][$key];
        array_push($imageArr,time().$name);
        var_dump(array_push($imageArr,time().$name));
        $tmpName = $_FILES['loadImg']['tmp_name'][$key];
        $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
        $type = finfo_file($fileInfo, $tmpName);
        if ($error == UPLOAD_ERR_OK) {
            if ($_FILES["loadImg"]["size"][$key] > $maxSize) {
                $errors = "Ошибка загрузки файла!Файл слишком большой!";
            }
            else{
                if (in_array($type, $validFileTypes)) {
                    $dataCard->insertCard($_POST["district"],$_POST["street"],$_POST["house"],$_POST["house_type"],$_POST["elevator"],$_POST["floor_number"],$_POST["number_flat"],$_POST["flat_price"],$_POST["flat_descr"],time().$name,$uploadDir);
                    if (!move_uploaded_file($tmpName, $uploadDir . time().$name)) {
                        $errors = "Не удалось загрузить изображение";
                    }
                    else {
                        $errors = "Расширение файла должно быть PNG или JPEG";
                    }
                }
            }
        }
        finfo_close($fileInfo);
    }
}




require_once $_SERVER["DOCUMENT_ROOT"] . "/routes/admin/index.view.php";