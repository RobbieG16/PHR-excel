<?php
session_start();
header("Content-Type: application/json");

include_once("db_connect.php"); // Include your database connection script



if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {

        // User found, update logged_in status to true and set session variable
        $updateQuery = "UPDATE login SET logged_in = 1 WHERE username = '$username'";
        mysqli_query($conn, $updateQuery);
        
        // Get available avatar and color from the database
        $availableDataQuery = "SELECT * FROM avatars WHERE is_available = 1 LIMIT 1";
        $availableDataResult = mysqli_query($conn, $availableDataQuery);
            
        $_SESSION["username"] = $username;
        // echo "Login successful!";
        header("Location: index.php");
        exit;
    } else {
        // echo "Login failed. Invalid username or password.";
        echo "Login successful!";
        header("Location: login1.php");
        exit;
    }
}
?>
<!--
session_start();
header("Content-Type: application/json");

include_once("db_connect.php"); // Include your database connection script

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) === 1) {
        // Get available avatar and color from the database
        $availableDataQuery = "SELECT * FROM avatars_colors WHERE is_available = 1 LIMIT 1";
        $availableDataResult = mysqli_query($conn, $availableDataQuery);

        if (mysqli_num_rows($availableDataResult) === 1) {
            $row = mysqli_fetch_assoc($availableDataResult);

            // Assign avatar and color to the user
            $selectedAvatar = $row["avatar"];
            $selectedColor = $row["color"];

            // Store user data in session
            $_SESSION["username"] = $username;
            $_SESSION["avatar"] = $selectedAvatar;
            $_SESSION["color"] = $selectedColor;

            // Mark the selected avatar and color as unavailable
            $selectedId = $row["id"];
            $markAsUnavailableQuery = "UPDATE avatars_colors SET is_available = 0 WHERE id = $selectedId";
            mysqli_query($conn, $markAsUnavailableQuery);

        echo "Login successful!";
        header("Location: index.php");
        exit;
    } else {
        echo "Login failed. Invalid username or password.";
        // echo "Login successful!";
        header("Location: login1.php");
        exit;
    }
}};
?> -->