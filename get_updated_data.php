<?php
header("Content-Type: application/json");

// Query the database to fetch the updated data
$query = "SELECT * FROM developers";
$result = mysqli_query($conn, $query);

// Fetch the data as an associative array
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Close the database connection

// Return the data in JSON format
echo json_encode($data);
?>
