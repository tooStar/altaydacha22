<?php
$link = mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
mysqli_select_db($link, "library41") or die("А нет такой таблицы");
$zapros = "DELETE FROM books WHERE id=".$_GET['id'];
mysqli_query($link, $zapros);
header('Location: index.php');
?>