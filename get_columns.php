<?php
include_once("db_connect.php");
$tableName = "developers";
$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$tableName'";
$result = mysqli_query($conn, $query);

$columnNames = [];
while ($row = mysqli_fetch_assoc($result)) {
    $columnNames[] = $row['COLUMN_NAME'];
}
echo json_encode($columnNames);
?>
