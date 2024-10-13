<?php
    session_start();
    if ($_SESSION['user']){
        header('Location: profile.php');
    }
    // Проверяем нажата ли кнопка отправки формы
    if (isset($_POST['doGo'])) {
        
        // Все последующие проверки, проверяют форму и выводят ошибку
        // Проверка на совпадение паролей
        if ($_POST['pass'] !== $_POST['pass_rep']) {
            $_SESSION['message'] = 'Пароли не совпадают';
        }
        
        // Проверка есть ли вообще повторный пароль
        elseif (!$_POST['pass_rep']) {
            $_SESSION['message'] = 'Введите повторный пароль!';
        }
        
        // Проверка есть ли пароль
        elseif (!$_POST['pass']) {
            $_SESSION['message'] = 'Введите пароль!';
        }
     
        // Проверка есть ли email
        elseif (!$_POST['email']) {
            $_SESSION['message'] = 'Введите почту!';
        }
     
        // Проверка есть ли логин
        elseif (!$_POST['login']) {
            $_SESSION['message'] = 'Введите логин!';
        }

        elseif (!$_POST['fio']) {
            $_SESSION['message'] = 'Введите ФИО!';
        }
     
        // Если ошибок нет, то происходит регистрация 
        elseif ($_SERVER["REQUEST_METHOD"] == "POST")  {
            $fio = $_POST['fio'];
            $login = $_POST['login'];
            $email = $_POST['email'];
            // Пароль хешируется
            $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
            // Если день рождения не был указан, то будет самый последний год из доступных
            $dob = $_POST['year_of_birth'];
            // Привязка
            require_once 'connect.php';
            //mysqli_set_charset($link, "utf8");

            //выборка по логину
            $result = mysqli_query($link, "SELECT * FROM users WHERE login = '$login' OR email = '$email'");
            if(mysqli_num_rows($result) > 0){
                $_SESSION['message'] = 'Такой логин или Email уже есть!';
            }
            else {
                $db = mysqli_query($link, "INSERT INTO users (fio, login, email, password, dob) VALUES ('$fio', '$login', '$email', '$pass', '$dob')");
                $_SESSION['upset'] = 'Регистрация прошла успешно!';
                header('Location: auth.php');
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
        <title>Регистрация</title>
    </head>
    <body>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            ФИО <input type="text" name="fio" placeholder="Введите ФИО полностью"> <samp style="color:red">*</samp>
            Логин <input type="text" name="login" placeholder="Введите логин"> <samp style="color:red">*</samp>
            EMail <input type="email" name="email" placeholder="Введите почту"><samp style="color:red">*</samp>
            Пароль <input type="password" name="pass" placeholder="Введите пароль"><samp style="color:red">*</samp>
            Повторите пароль <input type="password" name="pass_rep" placeholder="Введите пароль"><samp style="color:red">*</samp>
            Дата рождения <input type="date" name="year_of_birth" placeholder="Введите дату рождения">
            <input type="submit" value="Зарегистрироваться" name="doGo">
            <p>Уже зарегестрированы? - <a href="auth.php">Авторизируйтесь!</a></p>
            <?php
                if ($_SESSION['message']){
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>
    </body>
    </html>