<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>
<div class="admin-form">
    <form action="/routes/admin/index.php" method="post" enctype="multipart/form-data">
        <div class="admin-form-elements">
            <p class="admin-form__text">
                Добавьте район
            </p>
            <!--            <input type="text" name="district" required/>-->
            <select name="district" required>
                <option value="1">Калининский район</option>
                <option value="2">Курчатовский район</option>
                <option value="3">Ленинский район</option>
                <option value="4">Металлургический район</option>
                <option value="5">Советский район</option>
                <option value="6">Центральный район</option>
            </select>
            <p class="admin-form__text">
                Добавьте улицу
            </p>
            <input type="text" name="street" required>
            <p class="admin-form__text">
                Добавьте дом
            </p>
            <input type="text" name="house" required>
            <p class="admin-form__text">
                Выберите тип дома
            </p>
            <select name="house_type">
                <option value="1">Сталинка</option>
                <option value="2">Хрущевка</option>
                <option value="3">Брежневка</option>
                <option value="4">Студия</option>
                <option value="5">Стандарт</option>
            </select>
            <p class="admin-form__text">
                Наличие лифта?
            </p>
            <div class="elevator">
                <label for="elevator">Да</label>
                <input type="checkbox" name="elevator" value="1"/>
                <label for="elevator">Нет</label>
                <input type="checkbox" name="elevator" value="0" />
            </div>
            <p class="admin-form__text">
                Укажите этаж
            </p>
            <input type="number" name="floor_number" required/>
            <p class="admin-form__text">
                Добавьте номер квартиры
            </p>
            <input type="text" name="number_flat" required/>

            <p class="admin-form__text">
                Укажите стоимость квартиры
            </p>
            <input type="text" name="flat_price" required>
            <p class="admin-form__text">
                Описание:
            </p>
            <textarea wrap="hard" name="flat_descr"  cols="30" rows="10"></textarea>
            <p class="admin-form__text">
                Добавьте изображения
            </p>
            <input type="file" multiple name="loadImg[]" required>

            <br><br/>
            <input type="submit" name="submit_form" value="Отправить" id="">
        </div>
    </form>
</div>