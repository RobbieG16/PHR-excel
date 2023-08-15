<?php
include_once("db_connect.php");



// Validate the user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    $insertQuery = "INSERT INTO $tableName ($columns) VALUES ($values)";

    // Insert the row with all null values
    if ($conn->query($insertQuery) === TRUE) {
        echo "Row with all null values inserted successfully.";
        echo "<script>window.location.replace('index.php');</script>";
    } else {
        echo "Error inserting row: " . $conn->error;
    }
} else {
    echo "Invalid input. Please submit the form.";
}

// Close the connection
$conn->close();
?>
?>
