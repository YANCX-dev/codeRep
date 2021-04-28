<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/background.php" ?>
<div><p class="error-case"><?=$errors?></p></div>
<div class="admin-form">
    <form action="/routes/admin/createCard/index.php" class="createCard" method="post" enctype="multipart/form-data">
        <div class="admin-form-elements">
            <p class="admin-form__text">
                Добавьте район
            </p>
            <!--            <input type="text" name="district" required/>-->
            <select name="district" required>
                <option value="Калининский район">Калининский район</option>
                <option value="Курчатовский район">Курчатовский район</option>
                <option value="Ленинский район">Ленинский район</option>
                <option value="Металлургический район">Металлургический район</option>
                <option value="Советский район">Советский район</option>
                <option value="Центральный район">Центральный район</option>
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
                <option value="Сталинка">Сталинка</option>
                <option value="Хрущевка">Хрущевка</option>
                <option value="Брежневка">Брежневка</option>
                <option value="Студия">Студия</option>
                <option value="Стандарт">Стандарт</option>
            </select>
            <p class="admin-form__text">
                Наличие лифта?
            </p>
            <div class="elevator">
                <label for="elevator">Да</label>
                <input type="radio" name="elevator" value="1" required/>
                <label for="elevator">Нет</label>
                <input type="radio" name="elevator" value="0"/>
            </div>
            <p class="admin-form__text">
                Укажите этаж
            </p>
            <input type="number" name="floor_number" required/>
            <p class="admin-form__text">
                Добавьте номер квартиры
            </p>
            <input type="text" name="number_flat" required/>
            <p>Состав квартиры</p>
            <div class="flat_structure">
                <label for="flat_structure">Зал</label>
                <input class="checkbox-flat-structure" type="checkbox" name="flat_structure[]" value="Спальная комната"/>
                <label for="flat_structure">Спальная комната</label>
                <input class="checkbox-flat-structure" type="checkbox" name="flat_structure[]" value="Спальная комната"/>
                <label for="flat_structure">Кухня</label>
                <input class="checkbox-flat-structure" type="checkbox" name="flat_structure[]" value="Кухня"/>
                <label for="flat_structure">Ванная комната</label>
                <input class="checkbox-flat-structure" type="checkbox" name="flat_structure[]" value="Ванная комната"/>
                <label for="flat_structure">Лоджия</label>
                <input class="checkbox-flat-structure" type="checkbox" name="flat_structure[]" value="Лоджия"/>
                <label for="flat_structure">Балкон</label>
                <input class="checkbox-flat-structure" type="checkbox" name="flat_structure[]" value="Балкон"/>
            </div>
            <p class="admin-form__text">
                Укажите площадь квартиры
            </p>
            <input type="number" name="flat_square" required/>
            <p class="admin-form__text">
                Укажите стоимость квартиры
            </p>
            <input type="text" name="flat_price" required>
            <p class="admin-form__text">
                Описание:
            </p>
            <textarea wrap="hard" name="flat_descr" cols="30" rows="10"></textarea>
            <p class="admin-form__text">
                Добавьте изображения
            </p>
            <input type="file" multiple name="loadImg[]" required>

            <br><br/>
            <input type="submit" name="submit_form" value="Отправить" id="">
        </div>
    </form>
</div>