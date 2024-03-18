<?php
require_once 'dbh.inc.php';
require_once 'wheater-model.php';
$sensorData = getSensorDatabyDate($conn);
?>

<section class="vh-100 p-5 my-5" style="background-image: url('img/clouds.gif');">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-7 col-xl-5">
        <div id="wrapper-bg" class="card text-white bg-image shadow-4-strong" style="background-image: url('img/clouds.gif')">
          <!-- Main current data -->
          <div class="card-header p-4 border-0">
            <div class="text-center mb-3">
              <p class="h2 mb-1 text-black fw-bolder" id="wrapper-name">Sääkuiskaaja Weather</p>
              <div class="text-center  text-danger "></div>

              <div class="d-flex justify-content-around  text-dark mt-3">
                <p class="small fw-bolder">Temperature: <?php echo $sensorData['lampo']; ?>°C</p>
                <p class="small fw-bolder">Humidity: <?php echo $sensorData['kosteus']; ?>%</p>
                <p class="small fw-bolder">Pressure: <?php echo $sensorData['paine']; ?>hPa</p>
                <p class="small fw-bolder">Altitude: <?php echo $sensorData['korkeus']; ?>m</p>
                <p class="small fw-bolder">Date: <?php echo $sensorData['pvm']; ?></p>
              </div>
              <!-- Display temperature -->
              <p class="display-2 mb-1 text-black" id="wrapper-temp"><?php echo $sensorData['lampo']; ?>°C</p>
              <!-- Display pressure and humidity -->
              <span class=" text-black ">Pressure: <span class="text-black" id="wrapper-pressure"><?php echo $sensorData['paine']; ?>hPa</span></span>
              <span class="mx-2 text-black">|</span>
              <span class=" text-black">Humidity: <span class="text-black" id="wrapper-humidity"><?php echo $sensorData['kosteus']; ?>%</span></span>
            </div>
          </div>
          <!-- Daily forecast -->
          <div class="card-body px-5">
            <div class="row align-items-center">
              <div class="col-lg-6 text-black">
                <div class="row">
                  <strong>Today</strong>
                  <span id="wrapper-forecast-temp-today"><?php echo $sensorData['pvm']; ?></span>
                </div>
              </div>

              <div class="col-lg-2 text-center text-black">
                
                <i class="fas fa-cloud fa-7x  " style="color: #7999cd"></i>
              </div>

              <div class="col-lg-4 text-end text-danger fw-bolder">
               <span id="digital-clock"  ></span>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Function to update the digital clock
  function updateClock() {
    const now = new Date();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;
    document.getElementById('digital-clock').textContent = timeString;
  }

  // Update the clock every second
  setInterval(updateClock, 1000);

  // Function to update weather data
  function updateWeather() {
    // Fetch updated weather data from the server
    fetch('receive_data.php')
      .then(response => response.json())
      .then(data => {
        // Update HTML elements with the new weather data
        document.getElementById('wrapper-temp').innerText = data.lampo + '°C';
        document.getElementById('wrapper-pressure').innerText = data.paine + 'hPa';
        document.getElementById('wrapper-humidity').innerText = data.kosteus + '%';
        document.getElementById('wrapper-forecast-temp-today').innerText = data.pvm;

        // Update the marquee with weather and current date
        updateMarquee(data);
      })
      .catch(error => console.error('Error fetching data:', error));
  }

  // Update weather data every 20 seconds
  setInterval(updateWeather, 20000);

  // Initial call to update weather data
  updateWeather();
</script>