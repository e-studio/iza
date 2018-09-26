<?php
 // $grafica = new controller();
 // $grafica -> grafica1Controller();                 
?>

<script type="text/javascript">
  Chart.defaults.global.defaultFontFamily ='-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, { type: 'line',data: {
</script>


<script type="text/javascript">
                
  // Chart.js scripts
  // -- Set new default font family and font color to mimic Bootstraps default styling
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';
  // -- Area Chart Example
  var ctx = document.getElementById("myAreaChart");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["July","August","September"],
      datasets: [{
        label: "Sessions",
        lineTension: 0.3,
        backgroundColor: "rgba(2,117,216,0.2)",
        borderColor: "rgba(2,117,216,1)",
        pointRadius: 5,
        pointBackgroundColor: "rgba(2,117,216,1)",
        pointBorderColor: "rgba(255,255,255,0.8)",
        pointHoverRadius: 5,
        pointHoverBackgroundColor: "rgba(2,117,216,1)",
        pointHitRadius: 20,
        pointBorderWidth: 2,
        data: [10000, 30162, 26263],
      }],
    },
    options: {
      legend: {
        display: false
      }
    }
  });
</script>




