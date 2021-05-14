<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сoursework</title>
    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/resource/css/style.css">
    <link rel="stylesheet" href="/resource/css/slider.css">
</head>
<body>
<div class="wrapper">
    <div class="header header_rubix_font">
        <div class="header__item webname"><a href="/">REALTY</a></div>
        <?php if($_SESSION["auth"] == true && isset($_SESSION["role"]) == 0):?>
        <div class="header__item"><a href="#">Пользователь</a></div>
        <?php endif?>
        <div class="header__item"><a href="/routes/admin/index.php"><?=isset($_SESSION["role"])? "Администратор":""?></a></div>
        <div class="header__item"><a href="/routes/register/"><?=isset($_SESSION["auth"])? "":"Регистрация"?></a></div>
        <div class="header__item"><a href="/routes/auth/?out=true"><?=isset($_SESSION["auth"]) ? "Выход": "Авторизация"?></a></div>
    </div>