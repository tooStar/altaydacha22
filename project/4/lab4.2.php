<?php
// Connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "sample";

// Connect to MySQL server
$conn = mysqli_connect($host, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select the database
mysqli_select_db($conn, $database);

// Drop the notebook_NN table if it exists
$query = "DROP TABLE IF EXISTS notebook_NN";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Cannot drop notebook_NN table.");
}

// Create the notebook_NN table
$query = "CREATE TABLE notebook_NN (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    address VARCHAR(50) NOT NULL,
    birthday DATE NOT NULL,
    mail VARCHAR(20) NOT NULL
)";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Cannot create notebook_NN table.");
}

echo "notebook_NN table created successfully.";

// Close the MySQL connection
mysqli_close($conn);

