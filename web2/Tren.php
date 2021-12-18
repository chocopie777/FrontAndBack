<?php
require 'db.php'; 
$roleuser=$_SESSION['logged_user']->role; 
$userid=$_SESSION['logged_user']->id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <link rel="stylesheet" href="Tren.css">
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
                    student что-то качалка
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
        <div class = "container1"><center>
        
        <div class = "Xodit">
          <p>2</p>
          <div>      
          <img class= "ImXodit" src = "images/otjim.png" >
          <div class = "paragr1">
            <h1>Отжимание</h1>
            <p> Выполните отжимания следующим образом: 4     подхода по 20 повторений, отдых между подходами     составляет 30 секунд</p>
            <button>Готово</button> 
          </div>  
          </div>      
        </div>
      </center></div>
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
