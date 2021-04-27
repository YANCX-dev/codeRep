<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php var_dump((int)$_POST['flat_id']);?>
<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/background.php" ?>
<div class="shadow"></div>
<form action="index.php" method="post">
<div class="request-form">
    <p class="request-form-text">Ваше ФИО:</p>
    <input type="text" name="user-fullname">
    <p class="request-form-text">Ваш телефон:</p>
    <input type="text" name="user-phone">
    <p class="request-form-text">Ваш e-mail:</p>
    <input type="text" name="user-email">
    <input type="submit" name="submit_form" value="Отправить" id="">
</div>
</form>
</body>
</html>
