<?php
require_once 'dbh.inc.php';
require_once 'wheater-model.php';
$sensorData = getSensorData($conn);
?>

<section class="vh-100" style="background-color: #cdc4f9;">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-md-12 col-xl-10">
        <div class="card shadow-0 border border-dark border-5 text-dark" style="border-radius: 10px;">
          <div class="card-body p-4">
            <div class="row text-center">
              <?php foreach ($sensorData as $data): ?>
                <div class="col-md-9 border-end border-5 border-dark py-4">
                  <div class="d-flex justify-content-around mt-3">
                    <p class="small">Temperature: <?php echo $data['lampo']; ?>°C</p>
                    <p class="small">Humidity: <?php echo $data['kosteus']; ?>%</p>
                    <p class="small">Pressure: <?php echo $data['paine']; ?>hPa</p>
                    <p class="small">Altitude: <?php echo $data['korkeus']; ?>m</p>
                    <p class="small">Date: <?php echo $data['pvm']; ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
              <div class="col-md-3">
                <!-- Additional content for the third column -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
