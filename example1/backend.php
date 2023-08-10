<?php
// Assuming this is your server-side script that handles the AJAX request

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you are using PDO for database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "practice";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $newColumnName = $_POST['new_column_name'];
        
        // Update the database with the new column
        $sql = "ALTER TABLE your_table_name ADD $newColumnName VARCHAR(255)";
        $conn->exec($sql);
        
        // Return a success response
        echo json_encode(['status' => 'success']);
    } catch(PDOException $e) {
        // Return an error response
        echo json_encode(['status' => 'error', 'message' => 'An error occurred']);
    }
    
    $conn = null; // Close the connection
}
?>
