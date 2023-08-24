<?php


define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'excel');

$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
  die('Could not connect to the database: ' . mysqli_connect_error());
}

$img_folder = "/avatars";

$colors = array("#FF0000", "#00FF00", "#0000FF", "#FFFF00", "#FF00FF", "#00FFFF", "#FFA500", "#800080", "#008000", "#800000", "#008080", "#000080", "#FFC0CB", "#FFD700");

$images = scandir($img_folder);
foreach ($images as $img) {
  if (preg_match('/\.(jpg|jpeg|png|gif)$/', $img)) {
    $img_data = file_get_contents($img_folder . $img);

    $stmt = mysqli_prepare($conn, "INSERT INTO users (avatar, color) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "b", $img_data);

    mysqli_stmt_execute($stmt);
  }
}

mysqli_close($conn);
?>
