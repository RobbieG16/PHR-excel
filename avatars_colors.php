<?php

// Define constants for the MySQL connection
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'excel');

// Create a connection to the database
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if (!$conn) {
  die('Could not connect to the database: ' . mysqli_connect_error());
}

// Path to local folder with images 
$img_folder = "/avatars";

// Array of colors
$colors = array("#FF0000", "#00FF00", "#0000FF", "#FFFF00", "#FF00FF", "#00FFFF", "#FFA500", "#800080", "#008000", "#800000", "#008080", "#000080", "#FFC0CB", "#FFD700");

// Loop through images in folder
$images = scandir($img_folder);
foreach ($images as $img) {

  // Only process image files
  if (preg_match('/\.(jpg|jpeg|png|gif)$/', $img)) {

    // Read image file
    $img_data = file_get_contents($img_folder . $img);

    // Prepare statement
    $stmt = mysqli_prepare($conn, "INSERT INTO users (avatar, color) VALUES (?, ?)");

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "b", $img_data);

    // Execute statement
    mysqli_stmt_execute($stmt);
  }
}

// Close the database connection
mysqli_close($conn);
?>
