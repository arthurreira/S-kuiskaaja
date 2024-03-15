<?php
// Include the database connection file
require_once 'dbh.inc.php';

// Prepare SQL statement to select data from the sensor table
$sql = "SELECT * FROM sensor";

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch all sensor data
    $sensorData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Convert sensor data to JSON format
    $jsonResponse = json_encode($sensorData);
    
    // Set the response header to indicate JSON content
    header('Content-Type: application/json');
    
    // Output the JSON response
    echo $jsonResponse;
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
}
?>
