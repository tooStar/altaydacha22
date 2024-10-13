<?php
$link = mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
mysqli_select_db($link, "sample") or die("А нет такой таблицы");
$result = mysqli_query($link, "DROP TABLE IF EXISTS notebook_NN");
$query = "CREATE TABLE notebook_NN (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    birthday DATE NOT NULL,
    mail VARCHAR(20) NOT NULL
)";
$result = mysqli_query($link, $query) or die("Нельзя создать таблицу notebook_NN");
echo "Таблица notebook_NN создана";

mysqli_close($link);
?>