<?php
session_start();

// Define constants for the database connection
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'excel');

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
  if (!$conn) {
    die('Could not connect to the database: ' . mysqli_connect_error());
  }

  // Check if the username and password exist in the database
  $query = mysqli_query($conn, "SELECT * FROM login WHERE username='$username' AND password='$password'");
  if ($query) {
    $row = mysqli_fetch_assoc($query);

    if ($row) {

      $updateQuery = "UPDATE login SET logged_in = 1 WHERE username = '$username'";
      mysqli_query($conn, $updateQuery);

      $_SESSION['logged_in'] = true;

      $_SESSION['username'] = $username;
      header("Location: landing.php");
    } else {

      echo "Invalid username or password.";
      header("Location: login1.php");
    }
  } else {
    die('Error executing query: ' . mysqli_error($conn));
  }

  mysqli_close($conn);
}
?>

