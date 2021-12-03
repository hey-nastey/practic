<?php
$pdo = new PDO("mysql:host=localhost;dbname=library", "root", "root");
if (!$pdo){
    die('error connect to DB');
}
