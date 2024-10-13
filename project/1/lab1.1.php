<?php

# 1
$color = "blue";
$size = 24;
echo "<p style='color: $color; font-size: {$size}px;'>Текст</p>";

# 2
$str1 = "student";
$str2 = &$str1;
echo ($str2 . "<br>");
$str1 = "user";
echo ($str2 . "<br>");

# 3
$str1 = "student";
$str2 = &$str1;
echo ($str2 . "<br>");
$str1 = "user";
echo ($str2 . "<br>");

# 4
define("NUM_E", 2.71828 . "<br>");

# 5
echo ("Число e равно " . NUM_E . "<br>");

# 6
$num_e1 = NUM_E;
echo gettype($num_e1);

# 7
$num_e1 = NUM_E;
echo gettype($num_e1) . " " . $num_e1 . "<br>";
$num_e1 = (string) $num_e1;
echo gettype($num_e1) . " " . $num_e1 . "<br>";
$num_e1 = (int) $num_e1;
echo gettype($num_e1) . " " . $num_e1 . "<br>";
$num_e1 = (bool) $num_e1;
echo gettype($num_e1) . " " . $num_e1 . "<br>";
