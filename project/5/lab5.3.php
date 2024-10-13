<?php
session_start();

if (!isset($_SESSION['visits'])) {
    $_SESSION['visits'] = 1;
    echo "Welcome to our site!";
} else {
    $_SESSION['visits']++;
    echo "You have visited our site ".$_SESSION['visits']." times.";
}
?>