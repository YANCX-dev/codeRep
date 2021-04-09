<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сoursework</title>
    <link rel="stylesheet" href="/resource/css/style.css">
</head>
<body>
<div class="wrapper">
    <?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
    <?php include $_SERVER["DOCUMENT_ROOT"] . "/templates/background.php" ?>
    <div class="form_reg_block">
        <div class="form_reg_block_content">
            <p class="form_reg_block_head_text">Регистрация</p>
            <form class="form_reg_style" action="index.php" method="post">
                <label>Введите Ваш логин</label>
                <input type="text" name="reg_login" placeholder="Введите ваш логин" required>
                <label>Введите Ваш e-mail адрес</label>
                <input type="email" name="reg_email" placeholder="Введите e-mail адрес" required>
                <label>Введите Ваш пароль</label>
                <input type="password" name="reg_pass" placeholder="Введите пароль" required>
                <button class="form_reg_button" type="submit" name="form_reg_submit">Зарегестрироваться</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>