<html>
<head>
    <meta charset="UTF-8">

    <title></title>
</head>
<body>
    <?php
    $link = mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
    mysqli_select_db($link, "library41") or die("А нет такой таблицы");
    $zapros = "UPDATE books SET name='".$_GET['name']."', title='".$_GET['title']."' WHERE id =".$_GET['id'];
    mysqli_query($link, $zapros);
    if(mysqli_affected_rows($link) > 0) {
        echo  "Все сохранено";
    }
    else {
        echo "Ошибка";
    }
    ?>
    <a href="index.php">Вернуться к списку книг </a>
</body>
</html>