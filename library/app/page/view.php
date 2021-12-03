<?php
require_once ('../database/connect.php');
$book_id = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM `books` WHERE id=:id_book");
$res = $query->execute([':id_book'=>$book_id]);
$res = $query->fetch(PDO::FETCH_ASSOC);

$zapros = $pdo->prepare("SELECT `id_autors` FROM `connection` WHERE id_book =:id_book");
$zapros->execute(['id_book' =>$book_id]);
$autor_id = $zapros->fetch();
$id = $autor_id['id_autors'];

$query = $pdo->prepare("SELECT `name_autor` FROM `autors` WHERE id=:id");
$query->execute(['id'=>$id]);
$name_autor = $query->fetch();
$name = $name_autor['name_autor'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$res['name_book']?></title>
    <link rel="stylesheet" type="text/css" href="view.css">
</head>
<header class="header">
    <button class="button"><a href="/">Обратно</a></button>
    <button class="title"> <h1 class="h1">ONLINE-LIBRARY</h1> </button>      
</header>
<body class="body">
    <div class="book">
        <div class="img">
            <img src="../../uploads/<?= $res['image'];?>">
        </div>
        <div class="info">
        <p>Название:</p>
        <span><?=$res['name_book']?></span>
        <p>Автор:</p>
        <span><?=$name?></span>
        <p>Год написания:</p>
        <span><?=$res['year']?></span>
        <p>Описание:</p>
        <p><?=$res['content']?></p>
        </div>
        
    </div>
    
</body>
</html>
