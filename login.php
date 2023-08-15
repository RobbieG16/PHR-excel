<?php
// Replace with your actual database connection code
include_once("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace with your actual SQL query to check user credentials
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        // User is authenticated, set a session variable to indicate login status
        session_start();
        $_SESSION["userLoggedIn"] = true;

        // Return success response
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        // Return error response
        $response = array("success" => false, "message" => "Invalid username or password.");
        echo json_encode($response);
    }
}
?>