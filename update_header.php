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

// Fetch the updated header value and column index from the AJAX request
$newHeaderValue = $_POST['newHeaderValue'];
$columnHeaderIndex = $_POST['columnHeaderIndex'];

// Assuming your table name is 'developers'
$tableName = "developers";

// Assuming you have an array of existing column names in the same order as they appear in the table
$existingColumnNames = [
    "id",
    "app_status",
    "jobseeker_fname",
    // ... other column names ...
];

// Assuming you want to update the nth column header (column index starts from 0)
if ($columnHeaderIndex >= 0 && $columnHeaderIndex < count($existingColumnNames)) {
    $oldColumnName = $existingColumnNames[$columnHeaderIndex];

    // Use the ALTER TABLE query to rename the column
    $alterQuery = "ALTER TABLE $tableName CHANGE $oldColumnName $newHeaderValue VARCHAR(255)";
    
    if ($conn->query($alterQuery) === TRUE) {
        echo "Header updated successfully.";
    } else {
        echo "Error updating header: " . $conn->error;
    }
} else {
    echo "Invalid column index.";
}

$conn->close();
?>
