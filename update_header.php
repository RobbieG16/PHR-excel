<?php
include_once("db_connect.php");

// Get the updated header value and column index from the AJAX request
$newHeaderValue = $_POST['newHeaderValue'];
$columnHeaderIndex = $_POST['columnHeaderIndex'];

// Fetch the existing column names from the 'developers' table
$columns_query = "SHOW COLUMNS FROM developers";
$columns_result = mysqli_query($conn, $columns_query) or die("database error: " . mysqli_error($conn));

$existingColumnNames = array();
while ($column = mysqli_fetch_assoc($columns_result)) {
    if ($column['Field'] !== 'id') { // Exclude the 'id' column
        $existingColumnNames[] = $column['Field'];
    }
}

// Check if the column index is valid
if ($columnHeaderIndex >= 0 && $columnHeaderIndex < count($existingColumnNames)) {
    $oldColumnName = $existingColumnNames[$columnHeaderIndex];

    // Update the column name in the database
    $alterQuery = "ALTER TABLE developers CHANGE $oldColumnName $newHeaderValue VARCHAR(255)";
    
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
