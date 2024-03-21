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


function getLatestSensorData($conn) {
    try {
        // Prepare SQL query to fetch the latest sensor data
        $sql = "SELECT lampo, kosteus, paine, korkeus, pvm FROM sensordata ORDER BY pvm DESC LIMIT 1";
        $stmt = $conn->prepare($sql);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch the latest sensor data as an associative array
        $latestSensorData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Close the cursor
        $stmt->closeCursor();
        
        // Return the latest sensor data
        return $latestSensorData;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        return array(); // Return empty array in case of error
    }
}


function getLatestSensorDatadht11($conn) {
    try {
        // Prepare SQL query to fetch the latest sensor data
        $sql = "SELECT lampo, kosteus,pvm FROM sensor LIMIT 1";
        $stmt = $conn->prepare($sql);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch the latest sensor data as an associative array
        $latestSensorData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Close the cursor
        $stmt->closeCursor();
        
        // Return the latest sensor data
        return $latestSensorData;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        return array(); // Return empty array in case of error
    }
}

function getLatestSensorDatabme280($conn) {
    try {
        // Prepare SQL query to fetch the latest sensor data
        $sql = "SELECT lampo, kosteus, paine, korkeus, pvm FROM sensordata LIMIT 1";
        $stmt = $conn->prepare($sql);
        
        // Execute the query
        $stmt->execute();
        
        // Fetch the latest sensor data as an associative array
        $latestSensorData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Close the cursor
        $stmt->closeCursor();
        
        // Return the latest sensor data
        return $latestSensorData;
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        return array(); // Return empty array in case of error
    }
}


