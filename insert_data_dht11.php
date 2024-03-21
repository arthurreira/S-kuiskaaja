<?php
// Check if any data is received in the POST request
if (!empty($_POST)) {
    require_once 'dbh.inc.dht11.php';
    // Extract data from the POST request
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];

    try {

        // Prepare SQL statement to insert sensor data
        $sql = "INSERT INTO sensor (lampo, kosteus) 
                VALUES (:temperature, :humidity)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':temperature', $temperature, PDO::PARAM_STR);
        $stmt->bindParam(':humidity', $humidity, PDO::PARAM_STR);

        // Execute the SQL statement
        $stmt->execute();

        echo "New record created successfully";
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    } finally {
        // Close the database connection
        $conn = null;
    }
} else {
    // If no data is received in the POST request
    echo "Error: No data received in the POST request.";
}
