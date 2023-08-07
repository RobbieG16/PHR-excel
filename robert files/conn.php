<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phr_infosys";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    $firstname = sanitizeInput($data['firstname']);
    $middlename = sanitizeInput($data['middlename']);
    $lastname = sanitizeInput($data['lastname']);
    $jobtitle = sanitizeInput($data['jobtitle']);
    $contact = sanitizeInput($data['contact']);
    $contact2 = sanitizeInput($data['contact2']);
    $address = sanitizeInput($data['address']);
    $email = sanitizeInput($data['email']);
    $passport = sanitizeInput($data['passport']);
    $exp_years = sanitizeInput($data['exp_years']);
    $eligibility = sanitizeInput($data['eligibility']);
    $skype = sanitizeInput($data['skype']);
    $recruiter = sanitizeInput($data['recruiter']);

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

    // Insert other data into the per_user_uploads table
    $perUserUploadsSql = "INSERT INTO per_user_uploads (jobseeker_fname, jobseeker_mname, jobseeker_lname, jobtitle, contact, contact2, address, email, passport, exp_years, eligibility, skype_id, recruiter)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $perUserUploadsStmt = $conn->prepare($perUserUploadsSql);
    $perUserUploadsStmt->bind_param("sssssssssssss", $firstname, $middlename, $lastname, $jobtitle, $contact, $contact2, $address, $email, $passport, $exp_years, $eligibility, $skype, $recruiter);

    $conn->begin_transaction();
    try {
        // Execute the queries
        $userStmt->execute();
        $perUserUploadsStmt->execute();
        $conn->commit();
        return array("success" => true);
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $conn->rollback();
        return array("success" => false, "error" => "Error inserting data: " . $e->getMessage());
    }
}
