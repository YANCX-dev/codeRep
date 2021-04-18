<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сoursework</title>
    <link rel="stylesheet" href="/resource/css/style.css">
</head>
<body>
<div class="wrapper">
    <div class="header header_rubix_font">
        <div class="header__item webname"><a href="/">REALTY</a></div>
        <div class="header__item"><a href="/routes/register/"><?=isset($_SESSION["auth"])? "":"Регистрация"?></a></div>
        <div class="header__item"><a href="/routes/auth/?out=true"><?=isset($_SESSION["auth"]) ? "Выход": "Авторизация"?></a></div>
    </div>