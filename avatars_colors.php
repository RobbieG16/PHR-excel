<?php
// Set up your database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "excel";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$avatarDirectory = "avatars/";
$files = scandir($avatarDirectory);

foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
        $filePath = $avatarDirectory . $file;

        //Insert the image information into the database
        $sql = "INSERT INTO avatars (avatar) VALUES ('$filePath')";
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully: $filePath<br>";
        } else {
            echo "Error inserting record: " . $conn->error . "<br>";
        }
    }
}

$colors = array(
    "#FF0000",
    "#00FF00",
    "#0000FF",
    "#FFFF00",
    "#FF00FF",
    "#00FFFF",
    "#FFA500",
    "#800080",
    "#008000",
    "#800000",
    "#008080",
    "#000080",
    "#FFC0CB",
    "#FFD700"
);

foreach ($colors as $colorValue) {
    $sql = "INSERT INTO avatars (color) VALUES ('$colorValue')";
    if ($conn->query($sql) === TRUE) {
        echo "Color inserted successfully: $colorValue<br>";
    } else {
        echo "Error inserting color: " . $conn->error . "<br>";
    }
}


$conn->close();
?>
