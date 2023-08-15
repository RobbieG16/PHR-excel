<?php
// get_all_user_avatars.php

// Assuming you have a database connection established
include_once("db_connect.php");

// Fetch avatar information for all users from the database
$query = "SELECT id, avatar FROM users"; // Adjust the query based on your schema
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode([]);
} else {
    $userAvatars = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $userAvatars[] = $row;
    }
    echo json_encode($userAvatars);
}

mysqli_close($conn);
?>
