<?php
session_start();
require_once '../database/connect.php';
$email = $_POST['email'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
if ($password === $password_confirm){
    $password = md5($password);
    $sql = "INSERT INTO users (email, login, password) VALUES (:email, :login, :password)";
    $query = $pdo->prepare($sql);
    $query->execute(['email'=>$email, 'login'=>$login, 'password'=>$password]);
    $_SESSION['message'] = 'регистрация прошла успешно';
    header('Location: sign.php');
}
else{
    $_SESSION['message'] = 'пароли не совпадают';
    header('Location: register.php');
//    ?>
<!--    <script language="JavaScript">window.location.href("https://library/app/reguser/register.php")</script> --><?php
}

