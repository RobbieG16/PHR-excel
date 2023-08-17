<?php
session_start();
header("Content-Type: application/json");

// Check if the user is logged in
if (isset($_SESSION["username"])) {
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
