<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация администратора</title>
    <link rel="stylesheet" type="text/css" href="../reguser/sign.css">
</head>
<body class="body">
<div  class="cont">
    <div class="box">
        <form action="login.php" method="post" class="form">
            <h1>Admin-panel</h1>
            <p>Логин</p>
            <input name="login" type="text">
            <p>Пароль</p>
            <input name="password" type="password"><br>
            <button type="submit">Войти</button><br>
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
