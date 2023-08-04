<?php
// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "excel";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate the user input
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["num_rows"]) && is_numeric($_POST["num_rows"])) {
    $numRows = intval($_POST["num_rows"]);

    // Get the column names from your_table_name
    $tableName = 'developers';
    $columnNames = array();
    $sql = "SHOW COLUMNS FROM $tableName";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $columnNames[] = $row['Field'];
        }
    }

    // Construct the INSERT query
    $columns = implode(", ", $columnNames);
    $values = implode(", ", array_fill(0, count($columnNames), "NULL"));
    $insertQuery = "INSERT INTO $tableName ($columns) VALUES ";

    // Insert multiple rows with all null values
    for ($i = 0; $i < $numRows; $i++) {
        $conn->query($insertQuery . "($values)");
    }

    echo "$numRows row(s) with all null values inserted successfully.";
    echo "<script>window.location.replace('index.php');</script>";
} else {
    echo "Invalid input. Please enter a valid number of rows.";
}

// Close the connection
$conn->close();
?>
