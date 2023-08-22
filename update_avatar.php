<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "excel";

    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the POST request
$data = json_decode(file_get_contents("php://input"), true);

$avatar = $data['avatar'];
$color = $data['color'];

// Insert data into the 'users' table
$sql = "INSERT INTO users (avatar, color) VALUES ('$avatar', '$color')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>