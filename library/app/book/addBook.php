<?php
session_start();
require_once '../database/connect.php';
if (empty($_POST['autor'])){
    $_SESSION['message'] = 'поля не должны быть пустыми';
    header('Location:book.php');
    die();
}
function uploadeImage($image){
    $extension = pathinfo($image['name'],PATHINFO_EXTENSION);
    $filename = uniqid().".".$extension;
    move_uploaded_file($image['tmp_name'],"../../uploads/". $filename);
    return $filename;
}
$filename = uploadeImage($_FILES['image']);
$data = [
    "name_book" => $_POST['name_book'],
    "image"=>$filename,
    "content"=> $_POST['content'],
    "year" => $_POST['year']
];
$sql = "INSERT INTO books (name_book, image, content, year) VALUE (:name_book,:image, :content,:year)";
$statment = $pdo->prepare($sql);
$res = $statment->execute($data);

$query = "INSERT INTO autors (name_autor) VALUES (:name_autor)";
$statments = $pdo->prepare($query);
$statments->bindParam(":name_autor",$_POST['autor']);
$statments->execute();
//захватить id новой книги и автора и поместить в связующую табл
$zapros = $pdo->prepare("SELECT `id` FROM `autors` WHERE name_autor =:name_autor");
$zapros->execute(['name_autor' =>$_POST['autor']]);
$autor_id = $zapros->fetch();
$autor = $autor_id['id'];

$zapros2 = $pdo->prepare("SELECT `id` FROM `books` WHERE name_book =:name_book");
$zapros2->execute(['name_book' =>$data['name_book']]);
$book_id = $zapros2->fetch();
$book = $book_id['id'];

$zapros3 = $pdo->prepare("INSERT INTO `connection` (id_book, id_autors) VALUE (:book,:autors)");
$zapros3->execute(['book'=>$book,'autors'=>$autor]);
header('Location: book.php');