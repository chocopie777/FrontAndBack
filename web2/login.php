<?php
    require 'db.php'; 
    $data=$_POST;
    $roleuser=$_SESSION['logged_user']->role; 
$userid=$_SESSION['logged_user']->id;
    if(isset($data['Vhod'])){
        $errors= array();      
        $user=R::findOne('user', '_user_name=?',array($data['_user_name']));
        if( $user ){
            if(password_verify($data['_password'], $user->_password)){
                $_SESSION['logged_user']=$user;
                header('Location: main.php');
            }else{
                $errors[]='Неверно введен пароль!';
            }
        }else{
            $errors[]='Пользователь не найден';
        }
        if(!empty($errors)){
            $fsmsg=array_shift($errors);
        }
    }
?>
<html>
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
        <link rel="stylesheet" href="registration.css">
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
                        <?php echo $_SESSION['logged_user']->_user_name;?>
                        <?php else :?>
                            <?php endif ;?>
                        </div>
        </header>
        <div class="row">
        <div class="col-xl-12">
        <div class="main_request"> 
        <div class="request1"></div>
        <div class="request">         
            <div class="textss">Вход</div>
            <form class="form-signin" method="POST">
                <p class="texts px-md-4">Логин</br>
                    <input type="text" class="form-control input1" name="_user_name"  value="<?php echo @$data['_user_name']; ?>">         
                    <!-- <input type="text"  class="input1" name="_user_name" value="<?php echo @$data['_user_name']; ?>"> -->
                </p>
                <p class="texts px-md-4"> Пароль<br>
                    <input type="password" class="form-control input2" id="inputPassword" name="_password"  value="<?php echo @$data['_password']; ?>">
                    <!-- <input type="password" name="_password"  class="input2" value="<?php echo @$data['_password']; ?>"> -->
                </p>
                <div class="sub"><input type="submit" name="Vhod" class="buttonius" value="Войти"></div>     
        </form>
            <?php if(isset($fsmsg)){?><div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
        </div>
        <div class="request2"></div>
        </div>
        </div>
        </div>
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