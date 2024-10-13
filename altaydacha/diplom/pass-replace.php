<?php
session_start();
include_once 'connect.php';

if (isset($_POST['doGo'])) {
    if ($_POST['newpass'] !== $_POST['newpass_rep']) {
        $_SESSION['mispass'] = 'Пароли не совпадают';
    }
    else{
        $newpass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
        $log = $_SESSION['passworded']['login'];
        $db = mysqli_query($link, "UPDATE users SET password = '$newpass' WHERE login = '$log'");
    
        if(mysqli_affected_rows($link) > 0) {
            $_SESSION['upset'] = 'Пароль успешно изменен';
            unset($_SESSION['passworded']);
            header('Location: auth.php');
        }
        else {
            $_SESSION['mispass'] = 'Ошибка кода';
        }
    }
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="assets/main.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Замена пароля</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Новый Пароль <input type="password" name="newpass" placeholder="Введите новый пароль">
        Повторите пароль <input type="password" name="newpass_rep" placeholder="Повторите новый пароль">
        <input type="submit" value="Изменить" name="doGo">
        <?php
        if ($_SESSION['mispass']){
                echo '<p class="msg"> ' . $_SESSION['mispass'] . ' </p>';
            }
            unset($_SESSION['upset']);
        ?>
    </form>  
</body>
</html>