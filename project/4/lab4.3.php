<?php
// Include the database initialization file
require_once 'db_init.php';

// Connect to the database
$conn = db_connect();

// Retrieve the table name from the GET parameters
$table_name = $_GET['table_name'];

// Query the database for the table structure
$structure_query = "DESCRIBE $table_name";
$structure_result = mysqli_query($conn, $structure_query);

// Query the database for the table contents
$contents_query = "SELECT * FROM $table_name";
$contents_result = mysqli_query($conn, $contents_query);

// Disconnect from the database
db_disconnect($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $table_name ?></title>
    <link rel="stylesheet" type="text/css" href="lab4.3.css.html">
</head>
<body>
<h1><?php echo $table_name ?></h1>

<h2>Table Structure</h2>
<table>
    <tr>
        <th>Field</th>
        <th>Type</th>
        <th>Null</th>
        <th>Key</th>
        <th>Default</th>
        <th>Extra</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($structure_result)): ?>
        <tr>
            <td><?php echo $row['Field'] ?></td>
            <td><?php echo $row['Type'] ?></td>
            <td><?php echo $row['Null'] ?></td>
            <td><?php echo $row['Key'] ?></td>
            <td><?php echo $row['Default'] ?></td>
            <td><?php echo $row['Extra'] ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<h2>Table Contents</h2>
<table>
    <tr>
        <?php while ($field = mysqli_fetch_field($contents_result)): ?>
            <th><?php echo $field->name ?></th>
        <?php endwhile; ?>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($contents_result)): ?>
        <tr>
            <?php foreach ($row as $value): ?>
                <td><?php echo $value ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endwhile; ?>
</table>
</body>
</html>