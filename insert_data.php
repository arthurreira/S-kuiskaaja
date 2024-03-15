<?php
require_once 'dbh.inc.php';

// Get sensor data from POST request
$temperature = $_POST['temperature'];
$humidity = $_POST['humidity'];
var_dump($_POST);
// Prepare SQL statement to insert sensor data
$sql = "INSERT INTO sensor (lampo, kosteus) VALUES (:temperature, :humidity)";

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':temperature', $temperature);
    $stmt->bindParam(':humidity', $humidity);
    
    // Execute the SQL statement
    $stmt->execute();
    
    echo "New record created successfully";
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
}
?>
