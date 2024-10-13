<?php

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sample";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $city = $_POST["city"];
    $address = $_POST["address"];
    $birthday = $_POST["birthday"];
    $mail = $_POST["mail"];

    // Проверка на обязательные поля
    if (!empty($name) && !empty($mail)) {
        // Создание запроса для добавления записи в таблицу
        $sql = "INSERT INTO notebook_NN (name, city, address, birthday, mail)
                VALUES ('$name', '$city', '$address', '$birthday', '$mail')";
        mysqli_query($conn, $sql);
        echo "Record added successfully\n";
        // if (mysqli_query($conn, $sql)) {
        //     echo "Record added successfully\n";
        // } else {
        //     echo "Error adding record: " . mysqli_error($conn) . "\n";
        // }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Notebook Form</title>
</head>
<body>
	<h2>Notebook Form</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Name:</label>
		<input type="text" name="name"><br><br>

		<label>City:</label>
		<input type="text" name="city"><br><br>

		<label>Address:</label>
		<input type="text" name="address"><br><br>

		<label>Birthday:</label>
		<input type="text" name="birthday"><br><br>

		<label>Mail:</label>
		<input type="email" name="mail" required><br><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>
