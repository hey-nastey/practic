<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIBRARY</title>
    <link rel="stylesheet" type="text/css" href="asset/css/style.css">
</head>
<body>
    <header class="header">
        <div class="dropdown">
            <button class="dropbtn">
                <a style="color: black;" href="app/reguser/logout.php"> Выйти </a>
            </button>
        </div>

        <button class="title"> <h1 class="h1">ONLINE-LIBRARY</h1> </button>
        <button class="dropbtn"> Вы авторизированы</button>     
    </header>

    <main class="main">
        <div class="search">
            <form action="searchUser.php" method="post">
                <input class="text" placeholder="Искать здесь..." type="text" name="searchText">
                <input type="submit" class="poisk" value="Поиск">
            </form>
        </div>     
        <div class="bookList">
        
          <?php
            require_once('app/database/connect.php');
            $searchText = $_POST["searchText"];
            //выводит книгу по названию
            $query = $pdo->prepare("SELECT * FROM `books` WHERE `name_book` LIKE '%$searchText%'");
            $query->execute(); 
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            //выводит книгу по автору
            if (empty($res)){
                $sql = $pdo->prepare("SELECT * FROM `autors` WHERE `name_autor` LIKE '%$searchText%'");
                $sql->execute(); 
                $result = $sql->fetch();//масиив с именем и id автора
                //по известному id автора захватить в связ таблице id книги 
                //и по id книги вывести данные книги
                $zapros = $pdo->prepare("SELECT `id_book` FROM `connection` WHERE id_autors =:id_autors");
                $zapros->execute(['id_autors' =>$result["id"]]);
                $book_id = $zapros->fetch();

                $zapros2 = $pdo->prepare("SELECT * FROM `books` WHERE id =:id");
                $zapros2->execute(['id' =>$book_id["id_book"]]);
                $res = $zapros2->fetchAll();
            }                        
            foreach ($res as $val){ 
                $i=0;
                echo '
                    <div class="book">
                        <img src="uploads/'.$res[$i]['image'].'" height="150" width="150">
                        <ul class="ul">
                            <li>'.$result['name_autor'].'</li>
                            <li>'.$res[$i]['name_book'].'</li>
                            <li>'.$res[$i]['year'].'</li>
                            <li>
                            <button type="submit">
                            <a href="app/page/view.php?id='.$res[$i]['id'].'">
                            Подробнее
                            </a>
                            </button>
                            </li>
                        </ul>
                    </div>   
                ';
                $i++;
            }
            if(empty($res)){echo 'Такой книги или автора не существует';}
            ?>    
        </div>             
    </main>
<td>  
    <footer class="footer">
        <div >
            2021 Все права защищены
        </div>
    </footer> 
</body>
</html>