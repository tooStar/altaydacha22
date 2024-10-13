<?php
session_start();

$username = "admin";
$password = "12345";

if(isset($_POST["username"]) && isset($_POST["password"])) {
    if($_POST["username"] == $username && $_POST["password"] == $password) {
        $_SESSION["username"] = $_POST["username"];
        header("Location: lab5.2.1.php");
        exit;
    } else {
        echo "Invalid username or password. Please try again.<br>";
        echo "<a href='lab5.2.1.php'>Back to login form</a>";
        exit;
    }
}
?>