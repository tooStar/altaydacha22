<!DOCTYPE html>
<link rel="stylesheet" href="assets/profile_style.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
</head>
<body>
    <?php
    session_start();
    if (!$_SESSION){
        header('Location: auth.php');
    }
    include_once 'connect.php'; 
    ?>
    <div class="card">
        <div class="card_background_img"></div>
        <div>
            <a href="edit.php">
                <?php
                $log = $_SESSION['user']['login'];
                $ava = mysqli_query($link, "SELECT avatar FROM users WHERE login = '$log'");
                $pic = mysqli_fetch_assoc($ava);
                $chk = $pic['avatar'];
                if ($pic['avatar'] == NULL || !file_exists('$chk')){
                    echo '<img src="images/user.png" class="card_profile_img">';
                }
                else {
                    echo '<img src="'. $pic['avatar'] .'" class="card_profile_img">';
                }
                ?>
            </a>
        </div>
        <div class="user_details">
            <h3><?php echo $_SESSION['user']['login'];?></h3>
            <p>Рады вас видеть!</p>
        </div>
        <div class="card_count">
            <div class="count2">
                <div>
                    <h3><?php echo $_SESSION['user']['fio'];?></h3><br>
                    <p>ФИО</p>
                </div>
            </div>
            <div class="count">
                <div>
                    <h3><?php echo $_SESSION['user']['email'];?></h3><br>
                    <p>Почта</p>
                </div>
                <div>
                    <h3><?php echo $_SESSION['user']['dob'];?></h3><br>
                    <p>Дата рождения</p>
                </div>
            </div>
             <div class="btn">Обратная связь</div><br>
             <div class="exitbtn"><a href="logout.php">Выход</a></div>
        </div>
    </div>
</body>
</html>