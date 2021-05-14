<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>
<div class="create-form">
<div class="fill-form">
    <form action="/routes/admin/fillForm/index.php" class="createCard" method="post" enctype="multipart/form-data">
           <div class="select-form">
               <p>Укажите район</p>
               <input type="text" name="district_name">
           </div>
        <input type="submit" name="addDistrict" value="Добавить">
    </form>
</div>
<div class="fill-form">
    <form action="/routes/admin/fillForm/index.php" class="createCard" method="post" enctype="multipart/form-data">
        <div class="select-form">
            <p>Выберите район</p>
            <select name="select_district" id="">
                <?php foreach ($Districts as $dist):?>
                    <option value="<?=$dist->id?>"><?=$dist->district_name?></option>
                <?php endforeach;?>
            </select>
            <p>Укажите улицу</p>
            <input type="text" name="street_name">
        </div>
        <input type="submit" name="addStreet" value="Добавить">
    </form>
</div>
<div class="fill-form">
    <form action="/routes/admin/fillForm/index.php" class="createCard" method="post" enctype="multipart/form-data">
        <div class="select-form">
            <p>Выберите улицу</p>
            <?php $Streets = $dataCard->getStreet($_POST["select_district"]);?>
            <select name="select_street" id="">
                <?php foreach ($Streets as $st):?>
                    <option value="<?=$st->id?>"><?=$st->street_name?></option>
                <?php endforeach;?>
            </select>
            <p>Укажите номер дома</p>
            <input type="text" name="house_number">
            <p>Укажите тип дома</p>
            <select name="houseType" id="">
                <?php foreach($HouseType as $value):?>
                    <option value="<?=$value->id?>"><?=$value->type?></option>
                <?php endforeach;?>
            </select>
            <p>Наличие лифта</p>
            <div class="elevator"><p>Да</p>
                <input type="radio" name="elevator" value="1">
                <p>Нет</p>
                <input type="radio" name="elevator" value="0"></div>
            <p>Кол-во этажей</p>
            <input type="text" name="count_floor">

        </div>
        <input type="submit" name="addHouseNum" value="Добавить">
    </form>
</div>
<div class="fill-form">
    <form action="/routes/admin/fillForm/index.php" class="createCard" method="post" enctype="multipart/form-data">
            <p>Тип дома</p>
            <input type="text" name="addType">
        <input type="submit" name="addFloor" value="Добавить">
        </div>

    </form>
</div>
</div>