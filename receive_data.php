<?php
require_once 'dbh.inc.php';
require_once 'wheater-model.php';

// Check if sensor data is available
if (!empty($sensorData)) {
    $sensorData = getSensorData($conn);
    // Extract the relevant sensor data
    $temperature = $sensorData['temperature'];
    $humidity = $sensorData['kumidity'];
    $pressure = $sensorData['Pressure'];

    // Convert the sensor data into a format suitable for Google Charts
    $googleChartData = [
        ['Label', 'Value'],
        ['lampo', $temperature],
        ['kosteus', $humidity],
        ['Paine', $pressure],
    ];

    // Encode the data as JSON
    $googleChartDataJson = json_encode($googleChartData);
} else {
    // Handle the case when no sensor data is available
    // Set default values or display a message
    $googleChartDataJson = '[]'; // No data available
}
?>
