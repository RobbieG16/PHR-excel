<?php
// Include the connection file
include 'conn.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the user details from the AJAX request
    $username = $_POST["username"];
    $avatar = $_POST["avatar"];
    $color = $_POST["color"];

    // Check if the chosen avatar is already assigned to another user
    if (isAvatarAssignedToAnotherUser($avatar)) {
        // The avatar is already assigned to another user, send an error response
        $response = array("success" => false, "error" => "HAHAHAHA");
        echo json_encode($response);
    } else {
        // The avatar is not assigned to any user, so insert the user details into the database
        $query = "INSERT INTO users (username, avatar, color) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $username, $avatar, $color);

        if ($stmt->execute()) {
            // Send a JSON response back to the client to indicate success
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            // Error inserting data, send an error response
            $response = array("success" => false, "error" => "Error inserting data.");
            echo json_encode($response);
        }
    }
}
?>
