<?php
// Check if temperature and humidity parameters are present in the request
if(isset($_GET['temp']) && isset($_GET['hum'])) {
    // Extract temperature and humidity values from the request
    require_once 'dbh.inc.php';
    $temperature = $_GET['lampo'];
    $humidity = $_GET['kosteus'];

    // Display the received data
    echo "Temperature: $temperature °C<br>";
    echo "Humidity: $humidity %<br>";

    // TODO: Process the data (e.g., insert into database, log to file)
} else {
    // If temperature and humidity parameters are missing
    echo "Error: Temperature and/or humidity parameters missing.";
}
?>
