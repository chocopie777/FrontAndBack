<?php
require 'db.php'; 

$data = $_POST;
$roleuser=$_SESSION['logged_user']->role; 
$userid=$_SESSION['logged_user']->id;
$spisok=R::findAll("trainexecr");
$spisok1=R::findAll("typetraining");
$spisok2=R::findAll("listexercises");
$spisok3=R::findAll("user");
$s = 0;
$ss = 0;
$idt = -1;
$rr;
$ttt;
if(isset($data["sent"])){
    $type = $data['id'];
    R::exec("UPDATE `user` SET _tren_active='$type' WHERE `id` = '$userid'");
    header('Location: Session.php');
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
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
        <link rel="stylesheet" href="about.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
<body>
    <div class='dva'>
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
       <section> 
       <?php foreach ($spisok as $value)
       {
          $idt = $value['_id__type_training'];
          if ($idt != $idt1)
          {
            echo '<div class = "container1"><center>';
            echo '<div class = "Xodit">';
            echo '<div class = "paragr1">';
            echo '<h1>';
            $s = 0;
            foreach ($spisok1 as $value1)
            {
              if ($value['_id__type_training'] == $value1['id'])
              {
                if ($s == 0)
                {
                  echo $value1['_name__training'];
                  $rr = $value['_id__type_training'];
                  $s = 1;
                }
              }
            }
            echo '</h1>';
            echo '<ul>';
            foreach($spisok as $value3){
                      $ss = 0;
                      if($value3['_id__type_training'] == $idt)
                      {
                        echo '<li>';
                        foreach ($spisok2 as $value2)
                        {
                          if ($value3['_id__list_exercises'] == $value2['id'])
                          {
                            echo $value2['_name__exercises'];
                          }
                        }
                        echo '</li>';
                      }
            }
            echo '<ul>';
            echo '</div>';
            foreach ($spisok3 as $value4)
            {
                if($value4['id'] == $userid)
                {
                    $ttt = $value4['_tren_active'];
                }

            }
            if(isset($_SESSION['logged_user']))
            {
                if($ttt != NULL)            
                {
                    echo '<form method="POST">';
                    echo '<input type=checkbox required>';
                    echo '<a style="color: white">';
                    echo ' Уверенны? ';
                    echo '</a>';
                    echo '<button type="submit" name="sent">';
                    echo "<input type='hidden' name='id' value='$rr'>";
                    echo 'Заменить';
                    echo '</button>';
                    echo '</form>';
                }
                else
                {
                    echo '<form method="POST">';
                    echo '<button type="submit" name="sent">';
                    echo "<input type='hidden' name='id' value='$rr'>";
                    echo 'Начать';
                    echo '</button>';
                    echo '</form>';
                }
            }
            else
            {
                echo '<form method="POST">';
                echo '<button type="submit" name="sent">';
                echo "<input type='hidden' name='id' value='$rr'>";
                echo 'Начать';
                echo '</button>';
                echo '</form>';
            }
            echo '</div>';
            echo '</div>';
            $idt1 = $value['_id__type_training'];
          }
       }?>
       </section>
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