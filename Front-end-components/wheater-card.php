<?php
require_once 'dbh.inc.mbe280.php'; // Include your database connection file
require_once 'wheater-model.php'; // Include the file containing your getLatestSensorData function

// Get the latest sensor data using the function
$sensorDatabme280 = getLatestSensorData($conn); // Assuming $pdo is your PDO connection object
?>

<link rel="stylesheet" href="/Css/style.css">



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content bg-image opacity-50%" style="background-image: url('img/finland_wheater_background_for (4).jpeg')">
      <div class="modal-header">
        <h5 class="modal-title fw-bold text-white" id="exampleModalLabel">BME280 SENSOR </h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Main current data -->
        <div class="card text-white   bg-opacity-25 bg-light" >
          <div class="card-header  border-0">
            <div class="text-center mb-3">
              <div class="row d-flex justify-content-around text-dark mt-3">
                <p class="fw-bold fs-2">Lämpötila: <span class="text-success fw-bolder" id="temp"><?= $sensorDatabme280['lampo'] ?>°C</span></p>
                <p class="fw-bolder fs-2">Ilmankosteus: <span class="text-success fw-bolder" id="humidity"><?= $sensorDatabme280['kosteus']; ?>%</span></p>
                <p class="fw-bolder fs-2">Ilmanpaine: <span class="text-success fw-bolder" id="pressure"><?= $sensorDatabme280['paine'] ?>hPa</span></p>
                <p class="fw-bolder fs-2">Korkeus: <span class="text-success fw-bolder" id="altitude"><?= $sensorDatabme280['korkeus'] ?>m</span></p>
              </div>
              <!-- Display temperature -->
              <p class="display-2 fw-bolder mb-1 text-white" id="wrapper-temp"><?= $sensorDatabme280['lampo'] ?>°C</p>
            </div>
          </div>
          <!-- Daily forecast -->
          <div class="card-body ">
            <div class="row align-items-center">
              <div class="col-lg-6 text-black">
                <div class="row">
                  <strong class="text-danger">Viimeks pävitetty </strong>
                  <span id="wrapper-forecast-temp-today" class="text-warning fw-bold"><?= $sensorDatabme280['pvm'] ?></span>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="row align-items-center">
              <div class="col-lg-6 text-black">
                <!-- Display pressure and humidity -->
                <span class="text-white">Ilmanpaine: <span class="text-white" id="wrapper-pressure"><?= $sensorDatabme280['paine'] ?>hPa</span></span>
                <span class="mx-2 text-white">|</span>
                <span class="text-white">Ilmankosteus: <span class="text-white" id="wrapper-humidity"><?= $sensorDatabme280['kosteus'] ?>%</span></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
