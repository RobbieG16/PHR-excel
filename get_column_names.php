<?php
include_once("db_connect.php");
$columns_query = "SHOW COLUMNS FROM developers";
$columns_result = mysqli_query($conn, $columns_query) or die("database error: " . mysqli_error($conn));

$column_names = array();
while ($column = mysqli_fetch_assoc($columns_result)) {
    if ($column['Field'] !== 'id') {
        $column_names[] = $column['Field'];
    }
}
$column_names_json = json_encode($column_names);
echo json_encode($column_names);
?>
