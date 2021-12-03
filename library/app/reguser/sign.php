<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body class="body">
<!-- Форма Авторизация-->
<div  class="cont">
    <div class="box">
        <form action="signin.php" method="post" class="form">
            <h1>Авторизация</h1>
            <p>Логин</p>
            <input name="login" type="text">
            <p>Пароль</p>
            <input name="password" type="password"><br>
            <button type="submit">Войти</button>
            <p>У вас нет аккаунта? - <a href="register.php">Зарегистрируйтесь</a></p>
            <a href="/">Вернуться на главную</a><br>
            <?php
                if ($_SESSION['message']){
                    echo '<p class="msg">'. $_SESSION['message'].'</p>';}
                    unset ($_SESSION['message']);
            ?>
        </form>
    </div>    
</div>
</body>
</html>


