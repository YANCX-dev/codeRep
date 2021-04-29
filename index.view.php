<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php"?>
<!-- Хедер -->
<!-- Меню -->
<div class="menu">
    <ul class="menu-main__items">
        <li><a href="#">Покупка</a></li>
        <li><a href="#">Продажа</a></li>
        <li><a href="#">Новостройки</a></li>
    </ul>
</div>
<!-- Меню -->
<!-- Карточки -->
<div class="card-box">
    <?php foreach ($flats as $flat):?>
    <?php $images = $dataCard->getFlatImages($flat->id); ?>
        <div class="card">
            <div class="card__address">
                <p>ул. <?=$flat->street_name?>, д. <?=$flat->house_number?></p>
            </div>
            <div class="card__image"><img src="/resource/img/<?=$images[0]->image_name?>" alt="Квартира"></div>
            <a class="card_btn" href="/routes/open_card/index.php?id=<?=$flat->id?>">Посмотреть</a>
        </div>
    <?php endforeach;?>
</div>
</div>

</div>
</body>

</html>