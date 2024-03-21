<?php
require_once 'dbh.inc.mbe280.php';
require_once 'weather-model.php';

// Fetch latest sensor data from the database
$sensorData = getLatestSensorData($conn);

// Return the data as JSON
echo json_encode($sensorData);
?>