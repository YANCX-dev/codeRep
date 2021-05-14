<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/background.php" ?>
<div class="admin-form">
    <form action="/routes/admin/createCard/index.php" class="createCard" method="post" enctype="multipart/form-data">
        <div class="admin-form-elements">
            <p class="admin-form__text">
                Добавьте район
            </p>
            <select name="district" class="dist" required>
                <?php foreach ($flatInfo as $Info): ?>
                    <option value="<?= $Info->dist_id ?>"><?= $Info->district_name ?></option>
                <?php endforeach; ?>
            </select>
            <p class="admin-form__text">
                Добавьте улицу
            </p>
            <select name="street" class="street">
                <?php foreach ($flatInfo as $Info): ?>
                    <option value="<?= $Info->str_id ?>"><?= $Info->street_name ?></option>
                <?php endforeach; ?>
            </select>
            <p class="admin-form__text">
                Добавьте дом
            </p>
            <select name="house" class="house">
                <?php foreach ($flatInfo as $Info): ?>
                    <option value="<?= $Info->house_id ?>"><?= $Info->house_number ?></option>
                <?php endforeach; ?>
            </select>
            <p class="admin-form__text">
                Выберите тип дома
            </p>
            <select name="house_type" class="house_type">
                <?php foreach ($flatInfo as $Info): ?>
                    <option value="<?= $Info->house_id ?>"><?= $Info->type ?></option>
                <?php endforeach; ?>
            </select>
            <p class="admin-form__text">
                Добавьте номер квартиры
            </p>
            <input type="text" name="number_flat" required/>
            <p>Состав квартиры</p>
            <div class="flat_structure">
                <label for="flat_structure">Зал</label>
                <input class="checkbox-flat-structure" type="checkbox" name="flat_structure[]"
                       value="Спальная комната"/>


                <label for="flat_structure">Спальная комната</label>
                <input class="checkbox-flat-structure" type="checkbox" name="flat_structure[]"
                       value="Спальная комната"/>


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
            <input type="file" name="loadImg[]" multiple required>
            <br><br/>
            <input type="submit" class="flatAdd" name="submit_form" value="Отправить" id="">
        </div>
    </form>
</div>
