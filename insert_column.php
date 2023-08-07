<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "excel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
        echo "<script>window.location.replace('index.php');</script>";
    } else {
        echo "Error adding column: " . $conn->error;
    }
} else {
    echo "Error: Missing column name.";
}

// Close the connection
$conn->close();
?>
