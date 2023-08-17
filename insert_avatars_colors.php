<?php
include_once("db_connect.php"); // Include your database connection script

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$avatarOptions = $_POST['avatarOptions'];
$colorOptions = $_POST['colorOptions'];

foreach ($avatarOptions as $avatarValue => $avatarFile) {
    foreach ($colorOptions as $colorValue => $colorName) {
        $insertQuery = "INSERT INTO avatars_colors (avatar, color, is_available) VALUES ('$avatarFile', '$colorName', 1)";
        mysqli_query($conn, $insertQuery);
    }
}

mysqli_close($conn);
echo 'success';
?>
