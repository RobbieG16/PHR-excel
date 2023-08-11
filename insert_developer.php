<?php
include_once("db_connect.php");



// Prepare the SQL query
$sql = "INSERT INTO `developers`(`app_status`, `jobseeker_fname`, `jobseeker_mname`, `jobseeker_lname`, `jobtitle`, `jobtitle2`, `contact`, `contact2`, `address`, `email`, `passport`, `exp_years`, `eligibility`, `skype_id`, `date_encoded`, `recruiter`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully!";
} else {
    echo "Error";
}

// Close the connection
$conn->close();
?>
