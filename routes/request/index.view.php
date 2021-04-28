<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php var_dump((int)$_POST['flat_id']);?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/background.php" ?>
<div class="shadow"></div>
<!--<form action="index.php" method="post">-->
<!--<div class="request-form">-->
<!--    <p class="request-form-text">Ваше ФИО:</p>-->
<!--    <input type="text" name="user-fullname">-->
<!--    <p class="request-form-text">Ваш телефон:</p>-->
<!--    <input type="text" name="user-phone">-->
<!--    <p class="request-form-text">Ваш e-mail:</p>-->
<!--    <input type="text" name="user-email">-->
<!--    <input type="submit" name="submit_form" value="Отправить" id="">-->
<!--</div>-->
<!--</form>-->
<form class="decor" action="index.php" method="post">
    <div class="form-left-decoration"></div>
    <div class="form-right-decoration"></div>
    <div class="circle"></div>
    <div class="form-inner">
        <h3>Оставьте заявку!</h3>
        <input type="text" placeholder="Ваше ФИО" name="user-fullname">
        <input type="number" name="user-phone" placeholder="Ваш номер телефона">
        <input type="email" placeholder="Email" name="user-email">
        <input type="text" placeholder="Пожелание..." name="user-suggest" >
        <input type="submit" name="submit_form" value="Отправить">
    </div>
</form>
</body>
</html>
