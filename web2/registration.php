<?php 
    require 'db.php'; 
    $data = $_POST;
    $roleuser=$_SESSION['logged_user']->role;
    $errors = array(); 
    if(isset($data['registr'])){
        if(trim($data['_user_name'])==''){
            $errors[]= 'Введите логин';
        }
        if(trim($data['_email'])==''){
            $errors[]= 'Введите почту';
        }
        if($data['_password']==''){
            $errors[]= 'Введите пароль';
        }
        if(R::count('user', "_user_name=?",array($data['_user_name']))>0)
        {
            $errors[]= "Пользователь с таким логином уже существует";
        }
        if(R::count('user', "_email=?",array($data['_email']))>0)
        {
            $errors[]= "Пользователь с такой почтой уже существует!";
        }

        if(empty($errors)){
            $user=R::dispense('user');
            $user->_user_name = $data['_user_name'];
            $user->_email = $data['_email'];
            $user->_name = $data['_name'];
            $user->_gender = $data['_gender'];
            $user->_age = $data['_age'];
            $user->_weight = $data['_weight'];
            $user->_height = $data['_height'];
            $user->_password = password_hash($data['_password'], PASSWORD_DEFAULT);
            if($data['UserName']=='admin' and $data['Password']='admin')
            {
                $user->role = true;
            }
            else
            {
                $user->role = false;
            }
            R::store($user);
            $smsg="Вы успешно зарегистрировались";
        }else{
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
                    Student что то качалка
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
        <div class="black">
        <div class="request1"></div>
        <div class="request">            
            <div class="textss">Регистрация</div>
            <form class="form-signin" method="POST">
                <p class="texts px-md-4">Логин</br>
                    <input type="text"  class="form-control input1" name="_user_name" value="<?php echo @$data['_user_name']; ?>">
                </p>
                <p class="texts px-md-4">Имя</br>
                    <input type="text"  class="form-control input2" name="_name" value="<?php echo @$data['_name']; ?>">
                </p>
                <p class="texts px-md-4">Пол</br>
                    <input type="text"  class="form-control input3" name="_gender" value="<?php echo @$data['_gender']; ?>">
                </p>
                <p class="texts px-md-4">Возраст</br>
                    <input type="text"  class="form-control input4" name="_age" value="<?php echo @$data['_age']; ?>">
                </p>
                <p class="texts px-md-4">Вес</br>
                    <input type="text"  class="form-control input5" name="_weight" value="<?php echo @$data['_weight']; ?>">
                </p>
                <p class="texts px-md-4">Рост</br>
                    <input type="text"  class="form-control input6" name="_height" value="<?php echo @$data['_height']; ?>">
                </p>
                <p class="texts px-md-4"> Адрес электронной почты<br>
                    <input type="email" name="_email" required  class="form-control input2" value="<?php echo @$data['_email']; ?>">
                </p>
                <p class="texts px-md-4"> Пароль<br>
                    <input type="Password" name="_password"  class="form-control input2" value="<?php echo @$data['_password']; ?>">
                </p>
                <div class="sub px-md-4"><input type="submit" name="registr" class="buttonius" value="Зарегистрироваться"></div>     
        </form>
            <?php 
                if(isset($smsg)){
            ?>
            <div class="alert alert-success" role="alert"> 
            <?php 
                echo $smsg; 
            ?> 
            </div>
            <?php 
                }
            ?>
            <?php if(isset($fsmsg)){?><div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
        </div>
        <div class="request2"></div>
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