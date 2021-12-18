<?php
require 'db.php';
$roleuser=$_SESSION['logged_user']->role; 
$userid=$_SESSION['logged_user']->id;
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
    <link rel="stylesheet" href="Main.css">
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
          <div class="obertka1">
          <img class= "ImXodit" src = "images/Xodit.svg" >
          </div>
          <div class = "paragr1">
            <h1>Ходить</h1>
            <p> Необходимо держать спину и голову ровно, подбородок чуть приподнять — взгляд на уровне третьего этажа. При этом позвоночник выпрямляется, а диафрагма движется свободно. Плечи нужно расправить, освободить грудную клетку. Во время ходьбы задействуйте икроножные мышцы, для этого необходимо наступать на пятку, а затем плавно переносить центр тяжести на носок.</p>
          </div>        
        </div>
      </center></div>
      <div class = "container2"><center>
        <div class = "Prised">
          <div class = "paragr2">
            <h1>Приседания</h1>
            <p> Спина ровная, голова смотрит прямо или вверх, начинаем сгибать ноги. Таз ведём вниз и назад, одновременно сгибая ноги в коленях (колени не выезжают за носки). Корпус наклоняем чуть вперёд. Приседаем либо до параллели бёдер с полом, либо чуть ниже. Корпус в нижней точке наклонён примерно на 45 градусов, спина идеально ровная, таз отведён назад. Нагрузка должна упираться в пятки ног, а не в носки.</p>
          </div>        
          <img class= "ImPrised" src = "images/Prised.svg" >
        </div>
      </center></div>
      <div class = "container3"><center>
        <div class = "Podnimat">
          <img class= "ImPodnimat" src = "images/podty.svg" >
          <div class = "paragr3">
            <h1>Подтягивания</h1>
            <p> Подтягиваться нужно за счет силы мышц, не помогая себе раскачиваниями и ногами. Поднимать тело нужно плавно, избегая рывков и обрывистых движений. В процессе выполнения упражнения нужно тянуть подбородок. Если делается полное, а не частичное подтягивание, он должен подниматься выше перекладины. После подтягивания не нужно резко опускать туловище вниз. Вы должны выполнять все плавно.</p>
          </div>        
        </div>
      </center></div>
      <div class = "container4"><center>
        <div class = "Run">
          <div class = "paragr4">
            <h1>Бег</h1>
            <p> Сначала достаточно пробежаться 5-10 минут, затем столько же времени пройтись пешком, потом снова пробежаться 5-10 минут и так далее. Со временем время увеличивается. При пробежке важно уметь слушать свой организм и правильно рассчитывать свои силы. Не нужно бегать так, как будто вы догоняете кого-то.</p>
          </div>  
          <img class= "ImRun" src = "images/run.svg" >     
        </div>
      </center></div>
      <div class = "container5"><center>
        <div class = "Press">
          <img class= "ImPress" src = "images/press.svg" >
          <div class = "paragr5">
            <h1>Пресс</h1>
            <p> Ложитесь на спину руки скреплины за головой в замок. Поочередно поднимайте согнутые в коленях ноги, одновременно с этим поднимайте верхнюю часть с поворотом в сторону, так чтобы локоть коснулся колена. Локоть и колено должны быть разноименными, например левый локоть правое колено. </p>
          </div>        
        </div>
      </center></div>
      <div class = "container6"><center>
        <div class = "Push">
          <div class = "paragr6">
            <h1>Отжимания</h1>
            <p> При отжимании необходимо до конца сгибать руки, так чтобы, грудная клетка касалась поверхности, а после полностью разгибать локтевые суставы. </p>
          </div>  
          <img class= "ImPush" src = "images/push.svg" >     
        </div>
      </center></div>
      <div class = "container7"><center>
        <div class = "Skakat">
          <img class= "ImSkakat" src = "images/skakat.svg" >
          <div class = "paragr7">
            <h1>Прыжки на скакалке</h1>
            <p> Через скакалку нужно поочередно прыгать на каждую ногу, вторую оставляя согнутую в колене в воздухе, не приставлять. Стопа не становится на землю полностью, остается на подушечке. Движения легкие и плавные, не ударные. </p>
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
                    <img class='yandex'src="images/yandex.png" >
            </div>
        </div>
    </div>
</body>
</html>
