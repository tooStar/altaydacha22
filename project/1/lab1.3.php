<?php
$color = 'black';
echo '<table border="1" cellpadding="5">';

$i = 1;
while ($i <= 10) {
    echo '<tr>';
    $j = 1;
    while ($j <= 10) {
        $value = $i * $j;
        $bg_color = ($i == $j) ? 'yellow' : 'white';
        echo '<td style="background-color: ' . $bg_color . ';">' . $value . '</td>';
        $j++;
    }
    echo '</tr>';
    $i++;
}
echo '</table>';




$color = 'black';
$highlight_color = 'blue';
$plus_color = 'red';

echo '<table border="1" cellpadding="5">';

// First row with column headers
echo '<tr><td style="background-color: ' . $highlight_color . '; color: ' . $color . ';">+</td>';
for ($i = 1; $i <= 10; $i++) {
    echo '<td style="background-color: ' . $highlight_color . '; color: ' . $color . ';">' . $i . '</td>';
}
echo '</tr>';

// Remaining rows with row headers and data
for ($i = 1; $i <= 10; $i++) {
    echo '<tr>';
    echo '<td style="background-color: ' . $highlight_color . '; color: ' . $color . ';">' . $i . '</td>';
    for ($j = 1; $j <= 10; $j++) {
        $value = $i + $j;
        $bg_color = 'white';
        echo '<td style="background-color: ' . $bg_color . ';">' . $value . '</td>';
    }
    echo '</tr>';
}

echo '</table>';