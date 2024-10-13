<?php
$filename = 'notebook_NN.txt';
if (file_exists($filename)) {
    echo "Файл существует<br>";
} else {
    if (touch($filename)) {
        echo "Файл $filename был создан<br>";
    } else {
        die("Невозможно создать файл $filename.<br>");
    }
}

$file = fopen($filename, "a");

$conn = mysqli_connect("localhost", "root", "") or die("Невозможно подключиться к серверу");
mysqli_select_db($conn, "sample") or die("А нет такой таблицы");

$sql = "SELECT * FROM notebook_NN";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $row['birthday'] = preg_replace('~[^-a-z0-9_]+~u', '-', $row['birthday']);

        fwrite($file, $row['id'] . "|");
        fwrite($file, $row['name'] . "|");
        fwrite($file, $row['city'] . "|");
        fwrite($file, $row['address'] . "|");
        fwrite($file, $row['birthday'] . "|");
        fwrite($file, $row['mail'] . "\n");
    }
} else {
    echo "0 results<br>";
}

fclose($file);

$file = fopen($filename, "r");

if ($file) {
    while (($line = fgets($file)) !== false) {
        echo str_replace("|", " | ", $line) . "<br>";
    }
    fclose($file);
} else {
    die("Невозможно открыть файл $filename для чтения<br>");
}

mysqli_close($conn);
