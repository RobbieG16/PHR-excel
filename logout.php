<?php
session_start();
header("Content-Type: application/json");

include_once("db_connect.php");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    $deleteQuery = "DELETE FROM users WHERE username = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        $updateQuery = "UPDATE login SET logged_in = 0 WHERE username = '$username'";
        mysqli_query($conn, $updateQuery);

        session_unset();
        session_destroy();

        $response = array();
        $response['success'] = true;
        $response['message'] = "Logout successful";
        echo json_encode($response);
    } else {
        $response = array();
        $response['success'] = false;
        $response['error'] = "Error deleting user data: " . $stmt->error;
        echo json_encode($response);
    }
} else {
    $response = array();
    $response['success'] = false;
    $response['message'] = "User not logged in";
    echo json_encode($response);
}

?>
