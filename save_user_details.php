<?php

include 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $avatar = $_POST["avatar"];
    $color = $_POST["color"];


    if (isAvatarAssignedToAnotherUser($avatar)) {

        $response = array("success" => false, "error" => "HAHAHAHA");
        echo json_encode($response);
    } else {
        $query = "INSERT INTO users (username, avatar, color) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $username, $avatar, $color);

        if ($stmt->execute()) {
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            $response = array("success" => false, "error" => "Error inserting data.");
            echo json_encode($response);
        }
    }
}
?>
<script>
    const selectedUserDetails = <?php echo json_encode($selectedUserDetails); ?>;
</script>
