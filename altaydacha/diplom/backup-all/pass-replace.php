<?php
    session_start();
    if ($_SESSION['user']){
        header('Location: profile.php');
    }
    include_once 'connect.php';
    
    if (isset($_POST['doGo'])){
        $path = 'images/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], $path)) echo 'Ошибка при загрузке сообщения';
        else{
            $log = $_SESSION['user']['login'];
            mysqli_query($link, "UPDATE users SET avatar = '$path' WHERE login = '$log'");
            header('Location: profile.php');
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
    </form>  
</body>
</html>