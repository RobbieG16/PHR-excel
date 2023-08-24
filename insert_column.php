<?php
include_once("db_connect.php");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST['columnName'])) {
    $columnName = $_POST['columnName'];
    $addColumnQuery = "ALTER TABLE developers ADD $columnName VARCHAR(255)";
    
    if ($conn->query($addColumnQuery) === TRUE) {
        echo "New column added!";}
    };
?>