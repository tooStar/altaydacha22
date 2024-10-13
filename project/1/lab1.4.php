<?php
function Ru($color) {
    echo '<span style="color: '.$color.'">Привет!</span>';
}

function En($color) {
    echo '<span style="color: '.$color.'">Hello!</span>';
}

function Fr($color) {
    echo '<span style="color: '.$color.'">Bonjour!</span>';
}

function De($color) {
    echo '<span style="color: '.$color.'">GutenTag!</span>';
}

function WeekDay($day, $color) {
    global $size;
    echo '<span style="color: '.$color.'; font-size: '.$size.'">'.$day.'</span>';
    $size--;
}

// Example usage
$lang = $_GET['lang'] ?? 'En'; // default to English
$color = $_GET['color'] ?? 'black'; // default to black

switch($lang) {
    case 'Ru':
        Ru($color);
        break;
    case 'En':
        En($color);
        break;
    case 'Fr':
        Fr($color);
        break;
    case 'De':
        De($color);
        break;
    default:
        echo '<span style="color: '.$color.'">Language is unknown!</span>';
        break;
}

// Example usage of WeekDay function
$size = 7; // starting font size
WeekDay('Monday', 'red');
WeekDay('Tuesday', 'orange');
WeekDay('Wednesday', 'yellow');
WeekDay('Thursday', 'green');
WeekDay('Friday', 'blue');
WeekDay('Saturday', 'indigo');
WeekDay('Sunday', 'violet');