<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php"?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>
    <!-- Хедер -->
    <!-- Меню -->
    <div class="menu">
        <ul class="menu-main__items">
            <li><a href="#">Покупка</a></li>
            <li><a href="/routes/admin/index.php">Продажа</a></li>
            <li><a href="#">Новостройки</a></li>
        </ul>
    </div>
    <!-- Меню -->
    <!-- Карточки -->
    <div class="card-box">
        <?php foreach ($cardDb as $v):?>
        <div class="card">
            <div class="card__address">
                <p><?=$v->street_name?></p>
            </div>
            <div class="card__image"><img src="/resource/img/<?=$v->image_name?>" alt="Квартира"></div>
            <a class="card_btn" href="/routes/open_card/index.php?id=<?=$v->flat_id?>">Посмотреть</a>
        </div>
        <?php endforeach;?>
    </div>
</div>

</div>
</body>

</html>