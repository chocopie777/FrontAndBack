<?php
require 'db.php';
$data = $_POST;
$userid=$_SESSION['logged_user']->id;
$roleuser=$_SESSION['logged_user']->role;
$trenirovkaest=$_SESSION['logged_user']->_tren_active;
$spisok1=R::findAll("trainexecr");
$spisok2=R::findAll("user");
$spisok3=R::findAll("typetraining");
$spisok4=R::findall("listexercises");
$tektren;
$tekname;

if(isset($data["end"])){
    R::exec("UPDATE `user` SET _tren_active=Null WHERE `id` = '$userid'");
    header('Location: about.php');
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
        <link rel="stylesheet" href="Session.css">
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
                     Student ??????-???? ??????????????
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
                        <a href="main.php">???????????????????? ???? ????????????????????</a>
                        <a href="gallery.php">?????????????????????????????? ??????????????</a>
                        <a href="about.php">???????????? ????????????????????</a>
                        <? if($trenirovkaest != NULL):?>
                            <a href="Session.php">?????????????? ????????????????????</a>
                        <? endif; ?> 
                        <?php if(isset($_SESSION['logged_user'])): ?>
                            <a href="logout.php">??????????</a>
                        <?php else :?>
                            <a href="login.php">????????</a>
                            <a href="registration.php">??????????????????????</a>
                            <?php endif ;?>
                        <? if($roleuser == true):?>
                            <a href="unique.php">???????????? ????????????????????????????</a>
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
                            <?
                            echo '<div class="cart">';
                            if(isset($_SESSION['logged_user']))
                            {
                                foreach ($spisok2 as $value)
                                {
                                    if($value['id'] == $userid)
                                    {
                                        if($value['_tren_active'] != null)
                                        {
                                            $tektren = $value['_tren_active'];
                                        }
                                        else
                                        {
                                        }
                                    }
                                }
                                foreach ($spisok3 as $value2)
                                {
                                    if($value2['id'] == $tektren)
                                    {
                                        $tekname = $value2['_name__training'];
                                        break;
                                    }
                                }
                                echo "<span class='cartT'> $tekname ????????????????????</span>";
                                echo '<table class="table table-striped table-hover mt-2">'; 
                                echo '<div class="carts">';
                                echo '<form method="post">';
                                foreach ($spisok1 as $value3) 
                                { 
                                    if($value3['_id__type_training'] == $tektren)
                                    {
                                        echo "<a>";
                                        foreach($spisok4 as $value4)
                                        {
                                            if($value4['id']==$value3['_id__list_exercises'])
                                            {
                                                echo $value4['_name__exercises'];
                                            }
                                        }
                                        echo "<input type='checkbox' required>";
                                        echo "</a>";
                                        echo '<br></br>';
                                    }
                                }
                                echo '<button type="submit" name="end">';
                                echo "<a>";
                                echo "??????????????????";
                                echo "</a>";
                                echo '</button>';
                                echo '</form>';                         
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                            }
                            else
                            {
                                echo '<br></br>';
                                echo "<span class='cartT'> ?????? ???????????????? ?????????? ?????????????????????????? ???????????? ???????????????????????????????????? ????????????????????????! </span>";
                                echo '<div class="cart">';
                                echo '<table class="table table-striped table-hover mt-2">'; 
                                echo '<form action = "Registration.php">';
                                echo '<button>';
                                echo '<a>';
                                echo '??????????????????????????????????';
                                echo '</a>';
                                echo '</button>';
                                echo '</form>';
                                echo '<br></br>';
                                echo '<form action = "Login.php">';
                                echo '<button>';
                                echo '<a>';
                                echo '??????????????';
                                echo '</a>';
                                echo '</button>';
                                echo '</form>';
                                echo '<div class="carts">';                           
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>


    <div class="footer">
        <div class="group">
            <div class='kontakti'>
                <span class="conc">  
                    ????????????????
                </span>
                <span class="gg">
                    ??????????-????????????????, ???????????????????????? 7
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