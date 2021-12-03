<?php
require_once '../database/connect.php';
$name_autor = $_POST['name_autor']; 
$name_book = $_POST['name_book'];
$content = $_POST['content'];
$year = $_POST['year'];
$id_book = $_POST['id'];

$query = $pdo->prepare("UPDATE books SET name_book=:name_book,content=:content,year=:year WHERE id=:id");
$res = $query->execute(['name_book'=>$name_book, 'content'=>$content, 'year'=>$year,'id'=>$id_book]);

//взять id автора и по этому id обновить имя автора
$zapros = $pdo->prepare("SELECT `id_autors` FROM `connection` WHERE id_book =:id_book");
$zapros->execute(['id_book' =>$id_book]);
$autor_id = $zapros->fetch();
$id = $autor_id['id_autors'];


$query = $pdo->prepare("UPDATE autors SET name_autor=:name_autor WHERE id=:id");
$result = $query->execute(['name_autor'=>$name_autor, 'id'=>$id]);
//header('Location:updateBook.php');