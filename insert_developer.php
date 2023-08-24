<?php
include_once("db_connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tableName = 'developers';
    $columnNames = array();
    $sql = "SHOW COLUMNS FROM $tableName";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $columnNames[] = $row['Field'];
        }
    }
    $columns = implode(", ", $columnNames);
    $values = implode(", ", array_fill(0, count($columnNames), "NULL"));
    $insertQuery = "INSERT INTO $tableName ($columns) VALUES ($values)";
    if ($conn->query($insertQuery) === TRUE) {
        echo "Row with all null values inserted successfully.";
        echo "<script>window.location.replace('index.php');</script>";
    } else {
        echo "Error inserting row: " . $conn->error;
    }
} else {
    echo "Invalid input. Please submit the form.";
}

$conn->close();
?>
?>
