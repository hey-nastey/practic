
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
            <button class="dropbtn">Пользователь</button>
            <div class="dropdown-content">
                <a href="../app/reguser/register.php">Регистрация</a>
                <a href="../app/reguser/sign.php">Вход</a>
            </div>
        </div>
        <button class="title"> <h1 class="h1">ONLINE-LIBRARY</h1> </button>
        <button class="admin"> <a class="dropbtn" href="app/admin/auth.php">Администратор</a> </button>        
    </header>

    <main class="main">
        <div class="search">
            <form action="search.php" method="post">
                <input class="text" placeholder="Искать здесь..." type="text" name="searchText">
                <input type="submit" class="poisk" value="Поиск">
            </form>
        </div>     

        <div class="bookList">
          <?php
            require_once('app/database/connect.php');
            $query = $pdo->prepare("SELECT * FROM `books`");
            $query->execute(); 
            $res = $query->fetchAll(PDO::FETCH_ASSOC);
            $i=0;
            foreach ($res as $val){
                $zapros = $pdo->prepare("SELECT `id_autors` FROM `connection` WHERE id_book =:id_book");
                $zapros->execute(['id_book' =>$res[$i]["id"]]);
                $autor_id = $zapros->fetch();
                $id = $autor_id['id_autors'];

                $query = $pdo->prepare("SELECT `name_autor` FROM `autors` WHERE id=:id");
                $query->execute(['id'=>$id]);
                $name_autor = $query->fetch();
                $name = $name_autor['name_autor'];
                echo '
                    <div class="book">
                        <img src="uploads/'.$res[$i]['image'].'" height="250" width="220">
                        <ul class="ul">
                            <li>'.$name.'</li>
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