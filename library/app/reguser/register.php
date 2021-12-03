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
    <title>LIBRARY</title>
    <link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body class="body">
<!-- Форма регистрации-->
<div  class="cont">
    <div class="box">
        <form action="signup.php" method="post" class="form">
            <h1>Регистрация</h1>
            <p>Почта</p>
            <input type="email" name="email" placeholder="Введите свой email">
            <p>Логин</p>
            <input type="text" name="login" placeholder="Введите логин">
            <p>Пароль</p>
            <input type="password" name="password" placeholder="Введите пароль">
            <p>Подтверждение пароля</p>
            <input type="password" name="password_confirm" placeholder="Подтвердите пароль"><br>
            <button>Зарегистрироваться</button>
            <p>У вас уже есть аккаунт? - <a href="sign.php">Aвторизируйтесь</a></p>
            <a href="/">Вернуться на главную</a><br>
            <?php
            if ($_SESSION['message']){
                echo '<p class="msg" >'.$_SESSION['message'].'</p>';
                }
                unset ($_SESSION['message']);
            ?>
        </form>
    </div>    
</div>
</body>
</html>
