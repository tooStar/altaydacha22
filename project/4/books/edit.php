<html>
<head>
    <meta charset="UTF-8">

    <title>Редактирование книги</title>
</head>
<body>
    <?php
    $link = mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
    mysqli_select_db($link, "library41") or die("А нет такой таблицы");
    $rows = mysqli_query($link, "SELECT name, title FROM books WHERE id=".$_GET['id']);
    while ($stroka = mysqli_fetch_array($rows)) {
        $id = $_GET['id'];
        $name = $stroka['name'];
        $title = $stroka['title'];
    }
    echo "<form action = 'save_edit.php' method='get'>";
    echo "Автор <input name='name' value='".$name."'><br>";
    echo "Название <input name='title' value='".$title."'><br>";
    echo" <input type='hidden' name ='id' value='".$id."'><br>";
    echo "<input type='submit' name='' value='Сохранить'>";
    echo "</form>";

    ?>
    <!-- <form action = "save_edit.php" method="get">
        Автор <input name="name" value='".$name"'><br>
        Название <input name="title" value='".$title"'><br>
        <input type="hidden" name ="id" value='".$id"'><br>
        <input type="submit" name="" value="Сохранить">
    </form> -->
</body>
</html>