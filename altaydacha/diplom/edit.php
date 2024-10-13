<?php
    session_start();
    if (!$_SESSION){
        header('Location: auth.php');
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
<link rel="stylesheet" href="assets/profile_style.css">
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
</head>
<body>
    <div class="card">
        <div class="user_details">
            <br>
            <h3>Изменить аватар</h3><br>
            <p><?php echo $_SESSION['user']['login'];?></p>
        </div>
        <div class="card_count">
            <div class="count2">
                <div>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                    <label>Выберите изображение профиля</label><br>
                </div>
                <br>
                <div>
                    <input type="file" name="avatar">
                </div>
                <br>
                <div>
                    <input type="submit" name="doGo" class="btn" value="Изменить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>