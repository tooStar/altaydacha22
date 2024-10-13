<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];

    $check_user = mysqli_query($link, "SELECT * FROM users WHERE login = '$login'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "fio" => $user['fio'],
            "login" => $user['login'],
            "email" => $user['email'],
            "dob" => $user['dob'],
            "avatar" => $user['avatar']
        ];

        header('Location: profile.php');

    } else {
        header('Location: auth.php');
    }
?>


