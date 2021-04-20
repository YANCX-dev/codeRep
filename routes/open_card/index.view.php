<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>

<div class="card-openbox">
    <div class="card-openbox__img"><img src="/resource/img/<?=$cardImage[0]->image_name?>" alt="flat"></div>
    <div class="card-openbox__descr">
        <h1 class="card-openbox-title"><?=$card->street_name?></h1>
        <p class="card-openbox-text"><?=$card->descr?></p>
        <p><?=$cardImage[0]->image_name?></p>
    </div>
</div>
</body>
</html>