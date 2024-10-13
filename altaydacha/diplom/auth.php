<?php
session_start();
if ($_SESSION['user']){
    header('Location: profile.php');
}
// Проверка нажата ли кнопка отправки формы
if (isset($_POST['doGo'])) {
 
    // Последующий код проверяет вообще есть формы
    // Проверяет логин
    if (!$_POST['login']) {
        $_SESSION['message'] = 'Введите логин';
    }
    // Проверяет пароль
    elseif (!$_POST['pass']) {
        $_SESSION['message'] = 'Введите пароль';
    }
 
    // Проверяет ошибки
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        require_once 'connect.php';
        // берёт из БД пароль и id пользователя 
        if ($result = mysqli_query($link, "SELECT password, id FROM users WHERE login = '$login' ")) {
            while( $row = mysqli_fetch_assoc($result) ){ 
                // Проверяет есть ли id
                if ($row['id']) {
                    // если id есть, то он сравнивает пароли функцией password_verify
                    if (password_verify($pass, $row['password'])) {
                        // Если функция возвращает true, то вы входите
                            require_once('signin.php');
                    } 
                    else {
                         // Если функция возвращает false, то выводит ошибку
                         $_SESSION['message'] = "Неверный пароль!";
                    }
                } 
                else {
                    // Выводит ошибку если не нашли такой логин
                    $_SESSION['message'] = "Вы ввели не верный логин!";
                }
            } 
        }
    }
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="assets/main.css">
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        Логин <input type="text" name="login" placeholder="Введите логин">
        Пароль <input type="password" name="pass" placeholder="Введите Пароль">
        <input type="submit" value="Войти" name="doGo">
        <p>Нет аккаунта? - <a href="registration.php">Зарегистрируйтесь!</a></p>
        <p>Забыли пароль? - <a href="mail-verify.php">Вам сюда!</a></p>
        <?php
            if ($_SESSION['upset']){
                echo '<p class="msg"> ' . $_SESSION['upset'] . ' </p>';
            }
            unset($_SESSION['upset']);
            if ($_SESSION['message']){
                 echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>