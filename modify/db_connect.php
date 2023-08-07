<?php
/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "excel";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Function to sanitize input data (to prevent SQL injection)
function sanitizeInput($input)
{
    global $conn;
    return mysqli_real_escape_string($conn, $input);
}
// Function to check if the chosen avatar is already assigned to another user
function isAvatarAssignedToAnotherUser($avatar)
{
    global $conn;
    $avatar = sanitizeInput($avatar);

    $query = "SELECT COUNT(*) AS count FROM users WHERE avatar = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $avatar);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['count'] > 0;
}

// Function to insert data into the database
function insertDataToDB($data)
{
    global $conn;
    

    $avatar = $data['avatar']; // The chosen avatar value (not sanitized since it's already predefined)
    $color = $data['color'];
    $username = $data['username'];

    // Check if the chosen avatar is already assigned to another user
    if (isAvatarAssignedToAnotherUser($avatar)) {
        return array("success" => false, "error" => "Avatar already assigned to another user.");
    }

    // Insert user details into the users table
    $userSql = "INSERT INTO users (username, avatar, color) VALUES (?, ?, ?)";
    $userStmt = $conn->prepare($userSql);
    $userStmt->bind_param("sss", $username, $avatar, $color);


    $conn->begin_transaction();
    try {
        // Execute the queries
        $userStmt->execute();
        
        $conn->commit();
        return array("success" => true);
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        return array("success" => false, "error" => "Error inserting data: " . $e->getMessage());
    }
}
