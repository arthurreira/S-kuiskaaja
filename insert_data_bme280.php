<?php
// Check if any data is received in the POST request
if (!empty($_POST)) {
    require_once 'dbh.inc.mbe280.php';
    // Extract data from the POST request
    $temperature = $_POST['temperature'];
    $humidity = $_POST['humidity'];
    $pressure = $_POST['pressure'];
    $altitude = $_POST['altitude'];


    // Prepare SQL statement to insert sensor data
    $sql = "INSERT INTO sensordata (lampo,kosteus, paine, korkeus,pvm) 
            VALUES (:temperature, :humidity, :pressure, :altitude)";

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':temperature',$temperature, PDO::PARAM_STR);
        $stmt->bindParam(':humidity', $humidity, PDO::PARAM_STR);
        $stmt->bindParam(':pressure', $pressure, PDO::PARAM_STR);
        $stmt->bindParam(':altitude', $altitude, PDO::PARAM_STR);

        // Execute the SQL statement
        $stmt->execute();

        echo "New record created successfully";
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
    }
} else {
    // If no data is received in the POST request
    echo "Error: No data received in the POST request.";
}
?>
