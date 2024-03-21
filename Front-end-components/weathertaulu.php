<?php
require_once 'dbh.inc.mbe280.php'; // Include your database connection file
require_once 'wheater-model.php'; // Include the file containing your getLatestSensorData function

// Get the latest sensor data using the function
$sensorDatabme280 = getLatestSensorDatabme280($conn); // Assuming $conn is your PDO connection object
?>

<section class="vh-100" style="background-color: #cdc4f9;">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border border-dark border-5 text-dark" style="border-radius: 10px;">
          <div class="card-body p-4">
            <div class="row text-center">
              <div class="col-md-9 border-end border-5 border-dark py-4">
                <div class="d-flex justify-content-around mt-3">
                  <p class="small">Temperature: <?= $sensorDatabme280['lampo'] ?>°C</p>
                  <p class="small">Humidity: <?= $sensorDatabme280['kosteus'] ?>%</p>
                  <p class="small">Pressure: <?= $sensorDatabme280['paine'] ?>hPa</p>
                  <p class="small">Altitude: <?= $sensorDatabme280['korkeus'] ?>m</p>
                </div>
              </div>
              <div class="col-md-3">
                <p class="small">Date: <?= $sensorDatabme280['pvm'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
