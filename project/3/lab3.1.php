<?php
$treug = array();
for ($n = 1; $n <= 10; $n++) {
    $treug[] = $n * ($n + 1) / 2;
}

// Task 2: Create an array of squares of natural numbers
$kvd = array();
for ($n = 1; $n <= 10; $n++) {
    $kvd[] = pow($n, 2);
}

// Task 3: Combine the two arrays into one
$rez = array_merge($treug, $kvd);

// Task 4: Sort the combined array
sort($rez);

// Task 5: Remove the first element of the combined array
array_shift($rez);

// Task 6: Remove duplicates from the combined array
$rez1 = array_unique($rez);

// Task 7: Print a 30x30 Pythagorean table
echo "<table border='1' cellpadding='0'>";
for ($i = 1; $i <= 30; $i++) {
    echo "<tr>";
    for ($j = 1; $j <= 30; $j++) {
        $num = $i * $j;
        $bg_color = "";
        switch ($num % 7) {
            case 0:
                $bg_color = "white";
                break;
            case 1:
                $bg_color = "aqua";
                break;
            case 2:
                $bg_color = "blue";
                break;
            case 3:
                $bg_color = "yellow";
                break;
            case 4:
                $bg_color = "purple";
                break;
            case 5:
                $bg_color = "red";
                break;
            case 6:
                $bg_color = "lime";
                break;
        }
        echo "<td align='center' valign='middle' width='14' height='15' style='background-color: $bg_color'><span style='font-size: 1'>&nbsp;</span></td>";
    }
    echo "</tr>";
}
echo "</table>";

// Print the arrays to the screen
echo "Triangular Numbers: " . implode("  ", $treug) . "<br>";
echo "Squares of Natural Numbers: " . implode("  ", $kvd) . "<br>";
echo "Combined Array: " . implode("  ", $rez) . "<br>";
echo "Combined Array (Unique): " . implode("  ", $rez1) . "<br>";