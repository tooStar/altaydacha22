<!-- <?php
// Установление соединения с базой данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Выбор всех записей из таблицы notebook_NN
$sql = "SELECT * FROM notebook_NN";
$result = mysqli_query($conn, $sql);

// Вывод результатов запроса
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Date: " . $row["date"]. "<br>";
    }
} else {
    echo "0 results";
}

// Закрытие соединения
mysqli_close($conn);
?> -->

<html>

<head>
    <title>notebook_NN</title>
</head>

<body>
    <h1>Таблица notebook_NN</h1>
    <table border="1">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>city</td>
            <td>address</td>
            <td>birthday</td>
            <td>mail</td>
        </tr><?php
                $link = mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
                mysqli_select_db($link, "sample") or die("А нет такой таблицы");
                $rows = mysqli_query($link, "SELECT * FROM notebook_NN");
                while ($stroka = mysqli_fetch_array($rows)) {
                    echo "<tr>";
                    echo "<td>" . $stroka['id'] . "</td>";
                    echo "<td>" . $stroka['name'] . "</td>";
                    echo "<td>" . $stroka['city'] . "</td>";
                    echo "<td>" . $stroka['address'] . "</td>";
                    echo "<td>" . $stroka['birthday'] . "</td>";
                    echo "<td>" . $stroka['mail'] . "</td>";
                    echo "</tr>";
                }
                ?>
    </table>
</body>

</html>
