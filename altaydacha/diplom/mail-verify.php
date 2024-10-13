<?php
    session_start();
    if ($_SESSION['user']){
        header('Location: profile.php');
    }
    include_once 'connect.php';
    
    if (isset($_POST['doGo'])){

        $to  = $_POST['email'];

        $check = mysqli_query($link, "SELECT login, email FROM users WHERE email = '$to'");
        $log = mysqli_fetch_assoc($check);
        $login = $log['login'];
        $email = $log['email'];

        if ($to == $email){

            $_SESSION['passworded'] = [ "login" => $log['login'] ];

            $subject = "Здравствуйте, это автоматическое письмо для смены пароля!"; 

            $message = 'Ссылка на смену пароля: http://altaydacha/diplom/pass-replace.php';

            mail($to, $subject, $message);

            $_SESSION['upset'] = 'Письмо отправлено на вашу почту';
            header('Location: auth.php');
        }
        else{
            $_SESSION['upset'] = 'Пользователя с таким email нет';
            //header('Location: auth.php');
            var_dump($to);
            var_dump($login);
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
        <h3>Введите почту указанную при регистрации</h3><br>
        Почта <input type="email" name="email" placeholder="Введите почту">
        <input type="submit" value="Отправить" name="doGo">
        <p>Вам придет письмо со ссылкой на замену пароля</p>
    </form>  
</body>
</html>