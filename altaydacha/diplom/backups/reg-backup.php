<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Зарегистрироваться</title>
</head>
<body>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>">
        <fieldset class="FSreg">
            <legend>Регистрация</legend>
            <p>Логин: <input type="text" name="login" id="login"> <samp style="color:red">*</samp></p>
            <p>EMail: <input type="email" name="email" id="email"><samp style="color:red">*</samp></p>
            <p>Пароль: <input type="password" name="pass" id="pass"><samp style="color:red">*</samp></p>
            <p>Повторите пароль: <input type="password" name="pass_rep" id="pass_rep"><samp style="color:red">*</samp></p>
            <?php $year = date('Y'); ?>
            Год рождения:
            <select name="year_of_birth" id="year_of_birth">
            <option value="">----</option>
            <?php for ($i = $year - 14; $i > $year - 14 - 100; $i--) { ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php } ?>
            </select>
            <p><input type="submit" value="Зарегистрироваться" name="doGo"></p>
        </fieldset>
    </form>
</body>
</html>

<?php
// Проверяем нажата ли кнопка отправки формы
if (isset($_REQUEST['doGo'])) {
    
    // Все последующие проверки, проверяют форму и выводят ошибку
    // Проверка на совпадение паролей
    if ($_REQUEST['pass'] !== $_REQUEST['pass_rep']) {
        $error = 'Пароль не совпадает';
    }
    
    // Проверка есть ли вообще повторный пароль
    if (!$_REQUEST['pass_rep']) {
        $error = 'Введите повторный пароль';
    }
    
    // Проверка есть ли пароль
    if (!$_REQUEST['pass']) {
        $error = 'Введите пароль';
    }
 
    // Проверка есть ли email
    if (!$_REQUEST['email']) {
        $error = 'Введите email';
    }
 
    // Проверка есть ли логин
    if (!$_REQUEST['login']) {
        $error = 'Введите login';
    }
 
    // Если ошибок нет, то происходит регистрация 
    if (!$error) {
        $login = $_REQUEST['login'];
        $email = $_REQUEST['email'];
        // Пароль хешируется
        $pass = password_hash($_REQUEST['pass'], PASSWORD_DEFAULT);
        // Если день рождения не был указан, то будет самый последний год из доступных
        $dob = $_REQUEST['year_of_birth'];

        // Привязка
        $link = mysqli_connect("localhost", "root", "", "authorization-system") or die ("Невозможно подключиться к серверу") ;
        //mysqli_set_charset($link, "utf8");
        // Добавление пользователя
        
        $db = mysqli_query($link, "INSERT INTO 'users' ('login', 'email', 'password', 'dob') VALUES ('" . $login . "' , '" . $email . "' , " . $pass . " , '" . $dob . "')");
        
        /*$db = "INSERT INTO users ('login', 'email', 'password', 'dob') VALUES (?, ?, ?, ?)";
        $mysqli->execute_query($db, [$login, $email, $pass, $dob]);*/
        
        // Подтверждение что всё хорошо

        /*if (!$db) echo 'Регистрация прошла успешна';
        else echo 'Гавно';*/

        if(mysqli_affected_rows($link) > 0) {
            echo  "Все сохранено";
        }
        else {
            echo "Ошибка";
        }
    } else {
        // Если ошибка есть, то выводить её 
        echo $error; 
    }
} 
?>