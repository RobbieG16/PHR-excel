<?php
include_once("db_connect.php");

// Get the data from the AJAX request

// $app_status = $_POST['app_status'];
// $jobseeker_fname = $_POST['jobseeker_fname'];
// $jobseeker_mname = $_POST['jobseeker_mname'];
// $jobseeker_lname = $_POST['jobseeker_lname'];
// $jobtitle = $_POST['jobtitle'];
// $jobtitle2 = $_POST['jobtitle2'];
// $contact = $_POST['contact'];
// $contact2 = $_POST['contact2'];
// $address = $_POST['address'];
// $email = $_POST['email'];
// $passport = $_POST['passport'];
// $exp_years = $_POST['exp_years'];
// $eligibility = $_POST['eligibility'];
// $skype_id = $_POST['skype_id'];
// $date_encoded = $_POST['date_encoded'];
// $recruiter = $_POST['recruiter'];

// Add more variables for other input fields

// Prepare the SQL query
$sql = "INSERT INTO `developers`(`app_status`, `jobseeker_fname`, `jobseeker_mname`, `jobseeker_lname`, `jobtitle`, `jobtitle2`, `contact`, `contact2`, `address`, `email`, `passport`, `exp_years`, `eligibility`, `skype_id`, `date_encoded`, `recruiter`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, current_timestamp(), NULL)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
    echo "<script>window.location.reload();</script>";
} else {
    echo "Error";
}

// Close the connection
$conn->close();
?>
