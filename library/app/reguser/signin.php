<?php
session_start();
require_once '../database/connect.php';
$login = $_POST['login'];
$password = md5($_POST['password']);
$sql = "SELECT * FROM `users` WHERE `login` = $login AND `password` = '$password'";
$query = $pdo->prepare($sql);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);
if ($user===false){
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location:sign.php');
}
else{
    $user['login'];
    header('Location:../../user.php');
}

