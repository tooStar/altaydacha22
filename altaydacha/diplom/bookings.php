<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="assets/profile_style.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
</head>
<body>
    <?php
    session_start();
    if (!$_SESSION['user']){
        header('Location: auth.php');
    }
    include_once 'connect.php'; 
    ?>
    <div class="cardbooking">
        <div class="card_background_img"></div>
        <div>
                <?php
                $log = $_SESSION['user']['login'];
                $ava = mysqli_query($link, "SELECT avatar FROM users WHERE login = '$log'");
                $pic = mysqli_fetch_assoc($ava);
                $chk = $pic['avatar'];
                if ($chk == NULL || file_exists($chk) == false){
                    echo '<img src="images/user.png" class="card_profile_img">';
                }
                else {
                    echo '<img src="'. $pic['avatar'] .'" class="card_profile_img">';
                }
                
                $email = $_SESSION['user']['email'];
                $bd = mysqli_connect("localhost", "root", "", "booking-system") or die ("Невозможно подключиться к серверу");
                $home1 = mysqli_query($bd, "SELECT date FROM room1 WHERE email = '$email'");
                $i=0;
                $items1 = array();
                while(($datas1 = mysqli_fetch_assoc($home1)) !== NULL){
                    $items1[$i] = $datas1['date'];
                    $i++;
                }
                $home2 = mysqli_query($bd, "SELECT date FROM room2 WHERE email = '$email'");
                $i=0;
                $items2 = array();
                while(($datas2 = mysqli_fetch_assoc($home2)) !== NULL){
                    $items2[$i] = $datas2['date'];
                    $i++;
                }
                $home3 = mysqli_query($bd, "SELECT date FROM room3 WHERE email = '$email'");
                $i=0;
                $items3 = array();
                while(($datas3 = mysqli_fetch_assoc($home3)) !== NULL){
                    $items3[$i] = $datas3['date'];
                    $i++;
                }
                $home4 = mysqli_query($bd, "SELECT date FROM room4 WHERE email = '$email'");
                $i=0;
                $items4 = array();
                while(($datas4 = mysqli_fetch_assoc($home4)) !== NULL){
                    $items4[$i] = $datas4['date'];
                    $i++;
                }
                $home5 = mysqli_query($bd, "SELECT date FROM room5 WHERE email = '$email'");
                $i=0;
                $items5 = array();
                while(($datas5 = mysqli_fetch_assoc($home5)) !== NULL){
                    $items5[$i] = $datas5['date'];
                    $i++;
                }
                ?>
            </a>
        </div>
        <div class="user_details">
            <h3><?php echo $_SESSION['user']['login'];?></h3>
            <p>Ваши брони</p>
        </div>
        <div class="card_count">
            <div class="count">
                <?php
                if ($items1 != NULL){
                    $i=1;
                    echo '<div>Домик №1 на даты</div><div>';
                    foreach ($items1 as $value){
                        echo '(', $i, ') ', $value, ' | ';
                        $i++;
                    }
                    echo '<p></p></div>';
                }
            ?>
            </div>
            <div class="count">
            <?php
                if ($items2 != NULL){
                    $i=1;
                    echo '<div>Домик №2 на даты</div><div>';
                    foreach ($items2 as $value){
                        echo '(', $i, ') ', $value, ' | ';
                        $i++;
                    }
                    echo '<p></p></div>';
                }
            ?>
            </div>
            <div class="count">
            <?php
                if ($items3 != NULL){
                    $i=1;
                    echo '<div><p>Домик №3 на даты</p></div><div>';
                    foreach ($items3 as $value){
                        echo '(', $i, ') ', $value, ' | ';
                        $i++;
                    }
                    echo '<p></p></div>';
                }
            ?>
            </div>
            <div class="count">
            <?php
                if ($items4 != NULL){
                    $i=1;
                    echo '<div><p>Домик №4 на даты</p></div><div>';
                    foreach ($items4 as $value){
                        echo '(', $i, ') ', $value, ' | ';
                        $i++;
                    }
                    echo '<p></p></div>';
                }
            ?>
            </div>
            <div class="count">
            <?php
                if ($items5 != NULL){
                    $i=1;
                    echo '<div><p>Домик №5 на даты</p></div><div>';
                    foreach ($items5 as $value){
                        echo '(', $i, ') ', $value, ' | ';
                        $i++;
                    }
                    echo '<p></p></div>';
                }
            ?>
            <p>Для отмены бронирования свяжитесь с нами по номеру: +7 999 984 66-66</p>
            </div>
            <div class="smallbtn">
                <a href="profile.php">Назад</a>
            </div>
        </div>
    </div>
</body>
</html>