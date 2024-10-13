<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];

  echo ("<p> ФИО: " . $name . "<br>". "Почта: " . $email. "<br>" . "Телефон: " . $phone . "<br> </p>");
}

$answers = array("golden", "shacks", "lambsilence", "fazenda", "kuzkina", "iron", "ivan", "Morzh", "politicredo", "littleboy", "passport", "communism", "sklif", "rings");

for ($i = 0; $i < count($answers); $i++) {
    $number = $i + 1;
    if ($_POST["answer{$number}"] == $answers[$i]) {
        echo "Ответ {$number} верный";
    } else {
        echo "Ответ {$number} неверный";
    }
    echo "<br>";
}

echo "<br><a href='lab2.htm'> Назад </a>";

?>
