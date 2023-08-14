<?php
include_once("db_connect.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the column name from the POST request
if (isset($_POST['columnName'])) {
    $columnName = $_POST['columnName'];

    // SQL query to add a new column to the table
    $addColumnQuery = "ALTER TABLE developers ADD $columnName VARCHAR(255)";
    
    if ($conn->query($addColumnQuery) === TRUE) {
        echo "New column added!";}
    };
?>