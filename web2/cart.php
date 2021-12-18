<?php
require 'db.php'; 

$data = $_POST;
$roleuser=$_SESSION['logged_user']->role; 
$userid=$_SESSION['logged_user']->id;
$query= R::findLike('cart' , array( 'userid'=> array($userid)));
if(isset($data["delete"])){
    $delete=R::load("cart",$_GET["id"]);
    R::trash($delete);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
        <script>
            function OpenMenu() {
                document.getElementById("myDropdown").classList.toggle("show");
            }
            window.onclick = function(event) {
              if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                  var openDropdown = dropdowns[i];
                  if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                  }
                }
              }
            }
        </script>
        <link rel="stylesheet" href="CSS.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
<body>
    <div class='tri'>
        <header class='header'>
            <div class="logo">
                <a href="main.php" class="logo">
                <img class="logotip" src="images/logo.png">
                <span class="logostyle">
                    Онлайн магазин колдовства
                </span>
            </a>
            </div>
            <div class="headerPlan">
                <div class="dropdown">
                    <button onclick="OpenMenu()" class="dropbtn"> 
                        <div class="Menu">
                            <div class="MenuOpen1"></div>
                            <div class="MenuOpen2"></div>
                            <div class="MenuOpen3"></div>
                            <div class="MenuOpen2"></div>
                        </div>
                    </button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="main.php">Инструкция по выполнению</a>
                        <a href="gallery.php">Рекомендованное питание</a>
                        <a href="about.php">Список тренировок</a>
                        <? if($trenirovkaest != NULL):?>
                            <a href="Session.php">Текущая тренировка</a>
                        <? endif; ?> 
                        <?php if(isset($_SESSION['logged_user'])): ?>
                            <a href="logout.php">Выйти</a>
                        <?php else :?>
                            <a href="login.php">Вход</a>
                            <a href="registration.php">Регистрация</a>
                            <?php endif ;?>
                        <? if($roleuser == true):?>
                            <a href="unique.php">Панель администратора</a>
                        <? endif; ?>
                    </div>
                    </div>
                    </div>
                    <div class="logg">
                    <?php if(isset($_SESSION['logged_user'])): ?>
                        <?php echo $_SESSION['logged_user']->login;?>
                        <?php else :?>
                            <?php endif ;?>
                        </div>
        </header>
        <div class="cart">
                            <span class="cartT"> Товары в вашей корзине: </span>
                            <table class="table table-striped table-hover mt-2">
                                <thead class="table-dark">
                                <tr>
                                <th> Название товара </th>
                                <th> Дата добавления товара</th>
                                <th> Удалить</th>
                                </tr>
                                </thead>
                                <?php foreach ($query as $value) { ?> 
                                <tr>
                                <td><?=$value['tovar1name'] ?></td>
                                <td><?=$value['time1'] ?></td>
                                <td>
                                <form action="?id=<?=$value['id'] ?>" method="POST">                               
                                <button type="submit"  name="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form></td>
                                </tr>
                                </tr> <?php } ?>
                                </tbody>  
                            <div class="carts">                             
                            </table>
                            </div>
        </div>
    </div>
    <div class="footer">
        <div class="group">
            <div class='kontakti'>
                <span class="conc">  
                    Контакты
                </span>
                <span class="gg">
                    Ханты-Мансийск, Студенческая 7
                </span>
                <span>
                    <img class='call'src="images/call.png" > +7 (228) 148 822
                </span>
                <span>
                    <img class='call'src="images/call.png" > +7 (322) 322 322
                </span>
            </div>
            <div class="oplata">
                <span class="Opl">
                    Способы оплаты
                </span>
                <div class="sposobi">
                    <img class='visa'src="images/visa.png" >
                    <img class='kivi'src="images/kivi.png" >
                    <img class='yandex'src="images/yandex.png" >
                </div>
            </div>
        </div>
    </div>
</body>
</html>