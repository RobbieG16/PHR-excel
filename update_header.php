<?php
include_once("db_connect.php");

$newHeaderValue = $_POST['newHeaderValue'];
$columnHeaderIndex = $_POST['columnHeaderIndex'];

$columns_query = "SHOW COLUMNS FROM developers";
$columns_result = mysqli_query($conn, $columns_query) or die("database error: " . mysqli_error($conn));

$existingColumnNames = array();
while ($column = mysqli_fetch_assoc($columns_result)) {
    if ($column['Field'] !== 'id') {
        $existingColumnNames[] = $column['Field'];
    }
}
if ($columnHeaderIndex >= 0 && $columnHeaderIndex < count($existingColumnNames)) {
    $oldColumnName = $existingColumnNames[$columnHeaderIndex];

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
