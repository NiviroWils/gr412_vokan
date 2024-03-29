<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pop it MVC</title>
</head>
<body>
<header>
    <nav>
        <a href="<?= app()->route->getUrl('/hello') ?>">Главная</a>
        <?php
        if (!app()->auth::check()):
            ?>
            <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
            <a href="<?= app()->route->getUrl('/signup') ?>">Регистрация</a>
        <?php
        else:
            ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->name ?>)</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <div class="content_block">
    <?= $content ?? '' ?>
    </div>
</main>

</body>
<style>
    *{
        max-height: 1080px;
        max-width: 1920px;
        margin: 0;
        padding: 0;
    }
    nav{
        width: 1920px;
        height: 60px;
        background-color: #A6A6A6;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 50px;
        font-size: 30px;


    }
    a{
        text-decoration: none;
        color: white;
    }
    a:hover{
        color: #333333;
    }
    .content_block{

    }
</style>
</html>
