<?php
$lang = $_GET['lang'] ?? '';

echo $lang == 'ru' ? 'Привет' : 'Hello';
echo "<br>";

if ($lang == 'ru') {
    echo 'Русский';
} elseif ($lang == 'en') {
    echo 'Английский';
} elseif ($lang == 'fr') {
    echo 'Французский';
} elseif ($lang == 'de') {
    echo 'Немецкий';
} else {
    echo 'Язык неизвестен';
}

echo "<br>";

switch ($lang) {
    case 'ru':
        echo 'Русский';
        break;
    case 'en':
        echo 'Английский';
        break;
    case 'fr':
        echo 'Французский';
        break;
    case 'de':
        echo 'Немецкий';
        break;
    default:
        echo 'Язык неизвестен';
}