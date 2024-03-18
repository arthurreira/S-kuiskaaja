<?php
require_once 'dbh.inc.php';
require_once 'wheater-model.php';
$sensorData = getSensorDatabyDate($conn);
?>

<section class="vh-100 my-5" style="background-image: url('img/clouds.gif');">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-7 col-xl-5">
        <div id="wrapper-bg" class="card text-white bg-image shadow-4-strong" style="background-image: url('img/clouds.gif')">
          <!-- Main current data -->
          <div class="card-header p-4 border-0">
            <div class="text-center mb-3">
              <p class="h2 mb-1 text-black" id="wrapper-name">Sääkuiskaaja Weather</p>
              <!-- Display temperature -->
              <p class="display-1 mb-1 text-black" id="wrapper-temp"><?php echo $sensorData['lampo']; ?>°C</p>
              <!-- Display pressure and humidity -->
              <span class=" text-black">Pressure: <span class="text-black" id="wrapper-pressure"><?php echo $sensorData['paine']; ?>hPa</span></span>
              <span class="mx-2 text-black">|</span>
              <span class=" text-black">Humidity: <span class="text-black" id="wrapper-humidity"><?php echo $sensorData['kosteus']; ?>%</span></span>
            </div>
          </div>

          <!-- Hourly forecast -->
          <div class="card-body p-4 border-top border-bottom mb-2">
            <div class="row text-center text-black">
              <marquee behavior="scroll" direction="left" id="weather-marquee">Weather</marquee>
            </div>
          </div>

          <!-- Daily forecast -->
          <div class="card-body px-5">
            <div class="row align-items-center">
              <div class="col-lg-6 text-black">
                <strong>Today</strong>
              </div>

              <div class="col-lg-2 text-center text-black">
                <i class="fas fa-cloud fa-7x  " style="color: #7999cd"></i>
              </div>

              <div class="col-lg-4 text-end text-black">
                <!-- Display the date here -->
                <span id="wrapper-forecast-temp-today"><?php echo $sensorData['pvm']; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  // Function to update the content of the marquee with weather and current date
  function updateMarquee(weatherData) {
    // Get the current date and time
    const currentDate = new Date();
    const currentDateTimeString = currentDate.toLocaleString();

    // Construct the string to be displayed in the marquee
    const marqueeContent = `Weather: ${weatherData.temperature}°C, Pressure: ${weatherData.pressure}hPa, Humidity: ${weatherData.humidity}%, Current Date and Time: ${currentDateTimeString}`;

    // Update the content of the marquee
    document.getElementById('weather-marquee').textContent = marqueeContent;
  }

  // Function to update weather data
  function updateWeather() {
    // AJAX call to fetch updated weather data from the server
    fetch('receive_data.php')
      .then(response => response.json())
      .then(data => {
        // Update HTML elements with the new weather data
        document.getElementById('wrapper-temp').innerText = data.lampo + '°C';
        document.getElementById('wrapper-pressure').innerText = data.paine + 'hPa';
        document.getElementById('wrapper-humidity').innerText = data.kosteus + '%';
        document.getElementById('wrapper-forecast-temp-today').innerText = data.pvm;
      })
      .catch(error => console.error('Error fetching data:', error));
  }

  // Update weather data every 20 seconds
  setInterval(updateWeather, 20000);

  // Initial call to update weather data
  updateWeather();
</script>