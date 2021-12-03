<?php
require_once '../database/connect.php';
$book_id = $_GET['id'];
//var_dump($_GET['id']);

$zapros = $pdo->prepare("SELECT id_autors FROM connection WHERE id_book =:id_book");
$zapros->execute(['id_book' =>$book_id]);
$autor_id = $zapros->fetch();
$a = $autor_id['id_autors'];

$zap = $pdo->prepare("DELETE FROM autors WHERE id =:id");
$zap->execute([':id' =>$a]);

$query = $pdo->prepare("DELETE FROM books WHERE id=:book_id");
$query->execute([':book_id'=>$book_id]);

header('Location:../admin/content.php');
