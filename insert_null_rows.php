<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "excel";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["num_rows"]) && is_numeric($_POST["num_rows"])) {
    $numRows = intval($_POST["num_rows"]);
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
    $insertQuery = "INSERT INTO $tableName ($columns) VALUES ";

    for ($i = 0; $i < $numRows; $i++) {
        $conn->query($insertQuery . "($values)");
    }

    echo "$numRows row(s) with all null values inserted successfully.";
    echo "<script>window.location.replace('index.php');</script>";
} else {
    echo "Invalid input. Please enter a valid number of rows.";
}

$conn->close();
?>
