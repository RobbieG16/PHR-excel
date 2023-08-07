<?php
require_once 'conn.php';

// Check if data is received via POST
if (isset($_POST['firstname']) && isset($_POST['middlename']) && isset($_POST['lastname']) && isset($_POST['jobtitle']) && isset($_POST['contact']) && isset($_POST['contact2']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['passport']) && isset($_POST['exp_years']) && isset($_POST['eligibility']) && isset($_POST['skype']) && isset($_POST['recruiter'])) {

    // Sanitize the received data
    $firstname = sanitizeInput($_POST['firstname']);
    $middlename = sanitizeInput($_POST['middlename']);
    $lastname = sanitizeInput($_POST['lastname']);
    $jobtitle = sanitizeInput($_POST['jobtitle']);
    $contact = sanitizeInput($_POST['contact']);
    $contact2 = sanitizeInput($_POST['contact2']);
    $address = sanitizeInput($_POST['address']);
    $email = sanitizeInput($_POST['email']);
    $passport = sanitizeInput($_POST['passport']);
    $exp_years = intval($_POST['Exp years']); // Convert to integer
    $eligibility = sanitizeInput($_POST['eligibility']);
    $skype = sanitizeInput($_POST['skype']);
    $recruiter = sanitizeInput($_POST['recruiter']);

    // Create the SQL query for insertion
    $insertQuery = "INSERT INTO per_user_uploads (firstname, middlename, lastname, jobtitle, contact, contact2, address, email, passport, exp_years, eligibility, skype, recruiter) 
                    VALUES ('$firstname', '$middlename', '$lastname', '$jobtitle', '$contact', '$contact2', '$address', '$email', '$passport', '$exp_years', '$eligibility', '$skype', '$recruiter')";

    // Execute the insertion query
    if (mysqli_multi_query($conn, $insertQuery)) {
        echo "Data saved successfully";
    } else {
        echo "Error saving data: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request";
}

// Close the database connection
mysqli_close($conn);
?>
