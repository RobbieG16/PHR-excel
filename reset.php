<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "excel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming your_table_name is the name of your table
$query = "UPDATE developers SET app_status = NULL, jobseeker_fname = NULL, jobseeker_mname = NULL, jobseeker_lname = NULL, 
jobtitle = NULL, jobtitle2 = NULL, contact = NULL, contact2 = NULL, address = NULL, email = NULL, 
passport = NULL, exp_years = NULL, eligibility = NULL, skype_id = NULL, date_encoded = NULL, recruiter = NULL";

if ($conn->query($query) === TRUE) {
    echo "<script>window.location.replace('index.php');</script>";
} else {
    echo "Error executing query: " . $conn->error;
}

// Close the connection
$conn->close();
?>
