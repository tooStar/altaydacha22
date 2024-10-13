<?php
// Step 1: Check if the file exists or not
$filename = 'notebook_NN.txt'; // replace NN with team number
if (file_exists($filename)) {
    echo "The file exists.<br>";
} else {
    // If the file doesn't exist, create it
    if (touch($filename)) {
        echo "The file $filename has been created.<br>";
    } else {
        die("Failed to create the file $filename.<br>");
    }
}

// Open the file in append mode
$file = fopen($filename, "a");

// Step 2: Extract information from the notebook_NN table
include_once "db_connect.inc"; // include database connection file

$sql = "SELECT * FROM notebook_NN"; // replace NN with team number
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Replace date format
        $row['birthday'] = ereg_replace("([0-9]{4})-([0-9]{2})-([0-9]{2})", "\\3-\\2-\\1", $row['birthday']);

        // Write cell contents to the file
        fwrite($file, $row['id'] . "|");
        fwrite($file, $row['name'] . "|");
        fwrite($file, $row['city'] . "|");
        fwrite($file, $row['address'] . "|");
        fwrite($file, $row['birthday'] . "|");
        fwrite($file, $row['mail'] . "\n");
    }
} else {
    echo "0 results<br>";
}

// Close the file
fclose($file);

// Step 3: Read and display the file contents
$file = fopen($filename, "r");

if ($file) {
    while (($line = fgets($file)) !== false) {
        // Replace separator character and display the line
        echo str_replace("|", " | ", $line) . "<br>";
    }
    fclose($file);
} else {
    die("Failed to open the file $filename for reading.<br>");
}

// Close the database connection
mysqli_close($conn);
