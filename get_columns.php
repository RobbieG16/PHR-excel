<?php
include_once("db_connect.php"); // Include your database connection script

$tableName = "developers"; // Update with your table name

// Get column names from the table
$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tableName'";
$result = mysqli_query($conn, $query);

$columnNames = [];
while ($row = mysqli_fetch_assoc($result)) {
    $columnNames[] = $row['COLUMN_NAME'];
}

echo json_encode($columnNames);
?>
