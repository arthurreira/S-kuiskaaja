<?php

// model will takecare of querying the data base and only model iteract with our data base 
//allowing type decorations 
//prevent more erros 
declare(strict_types=1);


function getSensorData($conn) {
    // Query the sensor data from the database
    $query = "SELECT lampo, kosteus, paine, korkeus,pvm FROM sensordata";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($query);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch all sensor data
    $sensorData = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Return the sensor data
    return $sensorData;
}

function getSensorDatabyDate($conn) {
    // Query the sensor data from the database, selecting only the newest result
    $query = "SELECT lampo, kosteus, paine, korkeus, pvm FROM sensordata ORDER BY pvm DESC LIMIT 1";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($query);
    
    // Execute the query
    $stmt->execute();
    
    // Fetch the newest sensor data
    $sensorData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Return the sensor data
    return $sensorData;
}
