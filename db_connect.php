<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "excel";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

function isAvatarAssignedToAnotherUser($avatar)
{
    global $conn;

    $query = "SELECT COUNT(*) AS count FROM users WHERE avatar = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $avatar);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    return $row['count'] > 0;
}


function insertDataToDB($data)
{
    global $conn;
    
    $avatar = $data['avatar'];
    $color = $data['color'];
    $username = $data['username'];
    if (isAvatarAssignedToAnotherUser($avatar)) {
        return array("success" => false, "error" => "Avatar already assigned to another user.");
    }
    $userSql = "INSERT INTO users (username, avatar, color) VALUES (?, ?, ?)";
    $userStmt = $conn->prepare($userSql);
    $userStmt->bind_param("sss", $username, $avatar, $color);

    
    $conn->begin_transaction();
    try {
        $userStmt->execute();
        
        $conn->commit();
        return array("success" => true);
    } catch (Exception $e) {
        $conn->rollback();
        return array("success" => false, "error" => "Error inserting data: " . $e->getMessage());
    }
}
?>