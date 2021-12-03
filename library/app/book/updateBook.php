<?php
require_once '../database/connect.php';
$book_id = $_GET['id'];
$query = $pdo->prepare("SELECT * FROM `books` WHERE `id` = $book_id");
$query->execute();
$book = $query->fetch(PDO::FETCH_ASSOC);

//запрос в связ.табл оттуда вытащить id автора
//по этому id сделать запрос в таблицу autors
$zapros = $pdo->prepare("SELECT `id_autors` FROM `connection` WHERE id_book =:id_book");
$zapros->execute(['id_book' =>$_GET['id']]);
$autor_id = $zapros->fetch();
$id = $autor_id['id_autors'];

$zap = $pdo->prepare("SELECT `name_autor` FROM `autors` WHERE id =:id");
$zap->execute(['id' =>$id]);
$autor_name = $zap->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование книги</title>
    <link rel="stylesheet" type="text/css" href="book.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" 
    crossorigin="anonymous"></script>
</head>
<body class="body">
    <div class="form">
        <button class="ex"><a href="../admin/content.php">К списку книг</a></button>
        <h1>Редактирование книги</h1>
        <input type="hidden" name="id" class="id" value="<?= $book_id?>">
        <p>Автор книги:</p> 
        <input type="text" name="name_autor" class="name_autor" value="<?= $autor_name['name_autor']?>">      
        <p>Название книги:</p>
        <input type="text" name="name_book" class="name_book" value="<?= $book['name_book']?>"> 
        <p>Обложка книги:</p>
        <img src="../../uploads/<?= $book['image'];?>">
        <p>Описание книги:</p>
        <textarea name="content" class="content"><?= $book['content']?></textarea>
        <p>Год написания:</p>
        <input type="" name="year" class="year" value="<?= $book['year']?>"> 
        <button type="submit" class="otpravka">Сохранить</button>
</div>  
<script>
        $(document).ready(function () {
            $('button.otpravka').on('click',function () {
                var name_autorValue = $('input.name_autor').val();
                var name_bookValue = $('input.name_book').val();     
                var contentValue = $('textarea.content').val();
                var yearValue = $('input.year').val();
                var id_bookValue = $('input.id').val();
                $.ajax({
                    method: "POST",
                    url: "update.php",
                    data: { name_autor:name_autorValue, name_book:name_bookValue, 
                    content:contentValue,year:yearValue, id:id_bookValue }
                    })
                    /*.done(function( msg ) {
                        alert( "Data Saved: " + msg );
                    });*/
            })
        });
    </script>
</body>
</html>