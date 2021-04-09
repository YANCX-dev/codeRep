<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>

<div class="admin-form">
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="admin-form-elements">
            <p class="admin-form__text">
                Добавьте район
            </p>
            <input type="text" name="district"/>
            <p class="admin-form__text">
                Добавьте улицу
            </p>
            <input type="text" name="street">
            <p class="admin-form__text">
                Добавьте дом
            </p>
            <input type="text" name="house">
            <p class="admin-form__text">
                Добавьте квартиру
            </p>
            <input type="text" name="flat">
            <p class="admin-form__text">
                Добавьте изображения
            </p>
            <input type="file" name="" id="">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <br><br/>
            <input type="submit" name="submit_form" value="Отправить" id="">
        </div>
    </form>
</div>








</body>
</html>
