<?php
session_start();
//если условие не выполняется значит мы не авторизировались
$login = "1";
$password ="1";
if($_SESSION["login"]!==$login || $_SESSION["password"]!==$password){
    header('Location: /');
}
require_once 'getBook.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ</title>
    <link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body class="body">
    <header class="header">
        <nav class="nav">
            <p>Добро пожаловать в админку!</p>
            <a href="logout.php">ВЫХОД</a>
        </nav>
    </header>
    <main class="main">
        <h1>Cписок книг</h1>
        <a style="font-size: 20px;" href="../book/book.php">Добавить книгу</a>
        <div class="cont">
            <table class="table">
                <tr>
                    <th>ID книги</th>
                    <th>Название книги</th>
                    <th>Год написания книги</th>
                    <th>&#9998</th>
                    <th>&#10006</th>
                </tr>
                <?php foreach ($booksList as $book):?>
                    <tr>
                        <td><?= $book['id']; ?></td>
                        <td><?= $book['name_book']; ?></td>
                        <td><?= $book['year']; ?></td> 
                        <td><a href="../book/updateBook.php?id=<?= $book['id']; ?>">Редактировать</a></td> 
                        <td><a href="../book/delBook.php?id=<?= $book['id']; ?>">Удалить</a></td>       
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
    </main>
    </body>
</html>