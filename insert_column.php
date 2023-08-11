<?php
// Include the connection file
include 'db_connect.php';


// Get the column name from the POST request
if (isset($_POST['columnName'])) {
    $columnName = $_POST['columnName'];

    // SQL query to add a new column to the table
    $addColumnQuery = "ALTER TABLE developers ADD $columnName VARCHAR(255)";

    if ($conn->query($addColumnQuery) === TRUE) {
        // Fetch all column names from the 'developers' table
        $columns_query = "SHOW COLUMNS FROM developers";
        $columns_result = mysqli_query($conn, $columns_query) or die("database error: " . mysqli_error($conn));

        $editableColumns = array();
        while ($column = mysqli_fetch_assoc($columns_result)) {
            if ($column['Field'] !== 'id') { // Exclude the 'id' column
                $editableColumns[] = $column['Field'];
            }
        }

        echo json_encode($editableColumns); // Return the editable column names
    } else {
        echo "Error adding column: " . $conn->error;
    }
} else {
    echo "Error: Missing column name.";
}

// Close the connection
$conn->close();
?>
