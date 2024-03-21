<?php
require_once 'dbh.inc.dht11.php';
require_once 'weather-model.php';

// Fetch latest sensor data from the database
$Dht11sensorData = getLatestSensorDatadht11($conn);

// Return the data as JSON
echo json_encode($Dht11sensorData);
?>