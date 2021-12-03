<?php
require_once '../database/connect.php';
$result = $pdo->query('SELECT id, name_book, year FROM books ORDER BY id ASC');
$booksList = array();
$i = 0;
while ($row = $result->fetch()) {
    $booksList[$i]['id'] = $row['id'];
    $booksList[$i]['name_book'] = $row['name_book'];
    $booksList[$i]['year'] = $row['year'];
    $i++;
}
return $booksList;
?>
