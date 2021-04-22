<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>
<?php var_dump($openCard)?>
<div class="card-openbox">
    <div class="card-openbox__img"><img src="/resource/img/<?=$openCard->image_name?>" alt="flat"></div>
    <div class="card-openbox__descr">
        <h1 class="card-openbox-title"><?=$openCard->street_name?></h1>
        <p class="card-openbox-text"><?=$openCard->descr?></p>
    </div>
</div>
</body>
</html>