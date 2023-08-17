<?php
include_once("db_connect.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$avatarDirectory = 'avatars/';
$files = scandir($avatarDirectory);

foreach ($files as $file) {
    if ($file !== "." && $file !== ".." && pathinfo($file, PATHINFO_EXTENSION) === "jpg") {
        $insertQuery = "INSERT INTO avatars_colors (avatar) VALUES ('$file')";
        $result = mysqli_query($conn, $insertQuery); // Execute the query

        if ($result) {
            // Send a JSON response back to the client to indicate success
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            // Error inserting data, log the error
            error_log("Error inserting data: " . mysqli_error($conn));
            $response = array("success" => false, "error" => "Error inserting data.");
            echo json_encode($response);
        }
    }
}

mysqli_close($conn);
?>
