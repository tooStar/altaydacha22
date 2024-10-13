<html>
<head>

<title>Управление книгами</title>
</head>

<body>

<h1>Список книг</h1><a href="new.html">Добавить книгу</a>

<table>
<tr>
<td>#</td>
<td>Автор</td>
<td>Название</td>
<td>Редактировать</td>
<td>Уничтожить</td>

</tr><?php
$link = mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу") ;

mysqli_select_db($link, "library41") or die("А нет такой таблицы");

$rows = mysqli_query($link, "SELECT id , name , title FROM books");

while ($stroka = mysqli_fetch_array($rows)) {

echo "<tr>";
echo "<td>" . $stroka['id'] . "</td>";
echo "<td>" . $stroka['name'] . "</td>";
echo "<td>" . $stroka['title'] . "</td>";
echo "<td><a href='edit.php?id=" . $stroka['id'] . "'>Редактировать</a></td>";
echo "<td><a href='delete.php?id=" . $stroka['id'] . "'>Удалить</a></td>";
echo "</tr>";
}
?>
</table>
</body>
</html>