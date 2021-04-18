<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>

<div class="card-openbox">
    <div class="card-openbox__img"><img src="/resource/img/flat1.jpg" alt="flat"></div>
    <div class="card-openbox__descr">
        <h1 class="card-openbox-title"><?=$card->street_name?></h1>
        <p class="card-openbox-text"><?=$card->descr?></p>
    </div>
</div>
</body>
</html>