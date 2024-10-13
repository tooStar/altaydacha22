<?php
    session_start();
    if ($_SESSION['user']){
        header('Location: profile.php');
    }
    include_once 'connect.php';
    
    if (isset($_POST['doGo'])){

        $to  = $_POST['email'];
        
        if ($check = mysqli_query($link, "SELECT login FROM users WHERE unique_key = '$to'")){

            $log = mysqli_fetch_assoc($check);
            $login = $log['login'];

            $subject = "Здравствуйте! Это автоматическое письмо для смены пароля!"; 

            $message = ' <p>Текст письма</p> </br> <b>1-ая строчка </b> </br><i>2-ая строчка </i> </br>';

            $headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
            $headers .= "From: От кого письмо <from@example.com>\r\n"; 
            $headers .= "Reply-To: reply-to@example.com\r\n"; 

            mail($to, $subject, $message, $headers);
        }

        $_SESSION['upset'] = 'Письмо отправлено вам на почту';
    
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
        <p>Вам придет письмо со ссылкой на змену пароля</p>
    </form>  
</body>
</html>