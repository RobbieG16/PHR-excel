<?php
header("Content-Type: application/json");
$query = "SELECT * FROM developers";
$result = mysqli_query($conn, $query);
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
echo json_encode($data);
?>
