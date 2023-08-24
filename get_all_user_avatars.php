<?php
include_once("db_connect.php");
$query = "SELECT id, avatar FROM users";
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
