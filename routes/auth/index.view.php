<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>
<div class="form_auth_block">
    <div class="form_auth_block_content">
        <p class="form_auth_block_head_text">Авторизация</p>
        <form class="form_auth_style" action="index.php" method="post">
            <label>Введите ваш логин</label>
            <input type="text" name="auth_login" value="<?=$_SESSION["login"]?>" placeholder="Введите ваш логин" required >
            <label>Введите Ваш пароль</label>
            <input type="password" name="auth_pass" placeholder="Введите пароль" required >
            <button class="form_auth_button" type="submit" name="form_auth_submit">Войти</button>
        </form>
    </div>
</div>


</body>
</html>