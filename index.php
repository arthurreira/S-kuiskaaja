<?php
require_once 'config_session.inc.php';
require_once 'dbh.inc.php';
var_dump($_POST);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>Sääasema</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
</head>

<body>
  <!-- Display temperature here -->
  <h1 id="temperature">Temperature: Loading...</h1>

  <form action="receive_data.php" method="GET">

    <button class="btn" type="submit" name="wheater">
        wheater
    </button>

  </form>
  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.umd.min.js"></script>







  <script type="text/javascript">
    // Function to fetch temperature data from PHP script
    function fetchTemperature() {
      // Make an AJAX request to the PHP script
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "includes/receive_data.php", true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Update the HTML content with the received temperature data
          document.getElementById("temperature").innerHTML = "Temperature: " + xhr.responseText + " °C";
        }
      };
      xhr.send();
    }

    // Fetch temperature data on page load
    fetchTemperature();

    // Update temperature data every 5 seconds (adjust as needed)
    setInterval(fetchTemperature, 5000);
  </script>
</body>

</html>