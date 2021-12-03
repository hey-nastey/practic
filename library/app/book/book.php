<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавление книги</title>
    <link rel="stylesheet" type="text/css" href="book.css">
</head>
<body class="body">
    <?php if ($_SESSION['message']){
            echo '<p class="msg" > ' .$_SESSION['message']. '</p>';}
            unset ($_SESSION['message']);?>
    <form action="addBook.php"  method="post" enctype="multipart/form-data" class="form">
        <button class="ex"><a href="../admin/content.php">К списку книг</a></button> 
        <h1>Добавление книги</h1>
        <p>Автор книги:</p> <input type="text" name="autor" class=""> 
        <p>Название книги:</p><input type="text" name="name_book" class="name_book"> 
        <p>Обложка книги:</p><input type="file" name="image" class="image"> 
        <p>Описание книги:</p><textarea name="content" class="content" ></textarea>
        <p>Год написания:</p><input type="text" name="year" class="year">            
        <button type="submit">Добавить</button>
    </form>
</body>
</html>
