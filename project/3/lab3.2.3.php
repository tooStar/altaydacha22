<?php
$otv = array("usa" => "washington", "france" => "paris", "japan" => "tokyo");

$name = $_POST['name'];
$num_correct = 0;

if ($_POST['usa_capital'] == $otv['usa']) {
    $num_correct++;
}

if ($_POST['france_capital'] == $otv['france']) {
    $num_correct++;
}

if ($_POST['japan_capital'] == $otv['japan']) {
    $num_correct++;
}

switch ($num_correct) {
    case 0:
        $grade = "Poor";
        break;
    case 1:
        $grade = "Fair";
        break;
    case 2:
        $grade = "Good";
        break;
    case 3:
        $grade = "Excellent";
        break;
}

echo "<h1>Results</h1>";
echo "<p>Name: $name</p>";
echo "<p>Grade: $grade</p>";
?>