<?php
session_start();
header("Content-Type: application/json");

include_once("db_connect.php"); // Include your database connection script

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the user is logged in
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $updateQuery = "UPDATE login SET logged_in = 0 WHERE username = '$username'";
    mysqli_query($conn, $updateQuery);

    // Destroy the user's session to log them out
    session_unset();
    session_destroy();

    $response = array();
    $response['success'] = true;
    $response['message'] = "Logout successful";
    echo json_encode($response);
} else {
    $response = array();
    $response['success'] = false;
    $response['message'] = "User not logged in";
    echo json_encode($response);
}
?>
