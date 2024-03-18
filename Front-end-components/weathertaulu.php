<?php
require_once 'dbh.inc.php';
require_once 'wheater-model.php';
$sensorData = getSensorDatabyDate($conn);
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
                  <p class="small">Temperature: <?= $sensorData['lampo'] ?>°C</p>
                  <p class="small">Humidity: <?= $sensorData['kosteus'] ?>%</p>
                  <p class="small">Pressure: <?= $sensorData['paine'] ?>hPa</p>
                  <p class="small">Altitude: <?= $sensorData['korkeus'] ?>m</p>
                </div>
              </div>
              <div class="col-md-3">
                <p class="small">Date: <?= $sensorData['pvm'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>