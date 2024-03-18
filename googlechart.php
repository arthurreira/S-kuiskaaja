<?php
  require_once 'receive_data.php';

  ?>

<div id="chart_div"></div>












<script>
// Load the Google Charts library
google.charts.load('current', {packages: ['gauge']});

// Set a callback to draw the chart when the library is loaded
google.charts.setOnLoadCallback(drawChart);

// Function to draw the chart
function drawChart() {
    // Parse the JSON data
    var data = google.visualization.arrayToDataTable(<?php echo $googleChartDataJson; ?>);

    // Set chart options
    var options = {
        width: 400,
        height: 120,
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
    };

    // Instantiate and draw the chart
    var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>
