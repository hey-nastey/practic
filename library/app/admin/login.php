<?php
session_start();
$login = "1";
$password ="1";

if ($login===$_POST['login'] && $password===$_POST['password']){
    //сохраняем пользователя в сессию
    session_start();
    $_SESSION["login"] = $_POST['login'];
    $_SESSION["password"] = $_POST['password'];
    header ('Location: content.php');
}
else{
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: auth.php');
}