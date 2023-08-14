<?php
include_once("db_connect.php");

// Fetch column names from the 'developers' table
$columns_query = "SHOW COLUMNS FROM developers";
$columns_result = mysqli_query($conn, $columns_query) or die("database error: " . mysqli_error($conn));

$column_names = array();
while ($column = mysqli_fetch_assoc($columns_result)) {
    if ($column['Field'] !== 'id') { // Exclude the 'id' column
        $column_names[] = $column['Field'];
    }
}
 // Convert column names array to JSON for JavaScript use
 $column_names_json = json_encode($column_names);


echo json_encode($column_names);
?>
