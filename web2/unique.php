<?php
require 'db.php';

$data = $_POST;
$userid=$_SESSION['logged_user']->id;
$roleuser=$_SESSION['logged_user']->role;
$spisok1=R::findAll("typetraining");
$spisok2=R::findAll("listexercises");

if(isset($data["create1"])){
    $typetraining=R::dispense("typetraining");
    $typetraining->Name_Training=$data["Name_Training"];
    R::store($typetraining);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if(isset($data["create2"])){
    $listexercises=R::dispense("listexercises");
    $listexercises->Name_Exercises=$data["Name_Exercises"];
    R::store($listexercises);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if(isset($data["create3"])){
    $idT=R::dispense("trainexecr");
    $idT->_id__type_training=$data["Name_Trainings"];
    $idT->_id__list_exercises=$data["Name_Exercisess"];
    R::store($idT);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if(isset($data["add"])){
    $tt=R::load("typetraining",$_GET["id"]);
    $typetraining=R::dispense("typetraining");
    $typetraining->Name_Training=$tt["Name_Training"];
    $typetraining->userid=$userid;
    R::store($typetraining);
}
if(isset($data["add"])){
    $gg=R::load("listexercises",$_GET["id"]);
    $listexercises=R::dispense("listexercises");
    $listexercises->Name_Exercises=$gg["Name_Exercises"];
    $listexercises->userid=$userid;
    R::store($listexercises);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
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
        <link rel="stylesheet" href="unique.css">
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
                    Student что-то качалка
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
                            <div class="cartt">
                            <span class="cartTT"> Панель администратора: </span>
                            <div class="cartss">
                            <?php if($roleuser==true) :?>
                                <form action="" method="POST">

                                    <input type="text" name="Name_Training" placeholder="Тип тренировки">

                                    <input type="submit" name="create1" value="Cоздать">

                                </form>
                                <table class="table table-striped table-hover mt-2">
                                <thead class="table-dark">
                                <tr>
                                <th> Тип тренировки</th>
                                </tr>
                                </thead>
                                <?php foreach ($spisok1 as $value) { ?> 
                                <tr>
                                <td><?=$value['Name_Training'] ?></td>
                                </tr>
                                </tr> <?php } ?>
                                </tbody>

                                
                                <table class="table table-striped table-hover mt-2">
                                <thead class="table-dark">
                                <tr>
                                <th>Название упражнения</th>
                                </tr>
                                </thead>
                                <?php foreach ($spisok2 as $value) { ?> 
                                <tr>
                                <td><?=$value['Name_Exercises'] ?></td>
                                </tr>
                                </tr> <?php } ?>
                                </tbody>
                                
                                <form action="" method="POST">

                                    <input type="text" name="Name_Exercises" placeholder="Название упражнения">

                                    <input type="submit" name="create2" value="Cоздать">

                                </form>
                               
                                </tbody>
                                
                            <?php endif; ?>
                </table>
                 <form action="" method="POST">

                                <select name="Name_Trainings">
                                    <?php foreach ($spisok1 as $value1) 
                                    { ?> 
                                    <?="<option value='$value1[id]'>
                                    $value1[Name_Training]
                                    </option>"?>
                                    <?php 
                                    } ?>
                                </select>

                                <select name="Name_Exercisess">
                                    <?php foreach ($spisok2 as $value2) 
                                    { ?> 
                                    <?="<option value='$value2[id]'>
                                    $value2[Name_Exercises]
                                    </option>"?>
                                    <?php 
                                    } ?>
                                </select>

                                <input type="submit" name="create3" value="Создать">
                                </form>

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
                    <img class='yandex'src="images/yandex.png" >
            </div>
        </div>
    </div>
</body>
</html>