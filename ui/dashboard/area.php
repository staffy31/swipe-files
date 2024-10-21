<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Dashboard - Home</title>
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <script src="../../bootstrap/js/jquery.min.js"></script>
  <script src="../../bootstrap/js/bootstrap.min.js"></script>
  <link href="../../dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
  <link href="../../dist/css/icons/material-design-iconic-font/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="../../dist/css/icons/themify-icons/themify-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/sidenav.css">
  <link rel="stylesheet" href="../../css/home.css">
  <script src="../../js/chart.js"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('../../images/bg.png');
      background-size: cover;
      background-attachment: fixed;
      font-family: 'Arial', sans-serif;
    }
  </style>
</head>
<?php
// Sample JSON data for area chart (age vs. insurance code length)
$data = [
  ["client_id" => "1", "age" => 25, "insurance_code" => "18996"],
  ["client_id" => "2", "age" => 30, "insurance_code" => "18"],
  ["client_id" => "3", "age" => 35, "insurance_code" => "189504136"],
  ["client_id" => "4", "age" => 40, "insurance_code" => "189900484036"],
  ["client_id" => "5", "age" => 45, "insurance_code" => "189900484056"],
  ["client_id" => "6", "age" => 50, "insurance_code" => "189900481236"],
  ["client_id" => "7", "age" => 55, "insurance_code" => "189900484016"],
  ["client_id" => "8", "age" => 60, "insurance_code" => "18990048936"],
  ["client_id" => "9", "age" => 65, "insurance_code" => "189900484036"],
  ["client_id" => "10", "age" => 70, "insurance_code" => "189900481136"]
];

// Prepare data for Area Chart
$area_data = [];
foreach ($data as $entry) {
  $area_data[] = [
    "x" => (int)$entry["age"],  // Client's age (numerical value for x-axis)
    "y" => strlen($entry["insurance_code"])  // Length of insurance code for y-axis
  ];
}

// Prepare the PHP data for JavaScript
$js_area_data = json_encode($area_data);
?>

<body>
  <?php include "../../menu/side/sections/sidenav-dash.html"; ?>
  <div class="container-fluid">
    <div class="container">
      <!-- header section -->
      <?php
      require "../../php/header.php";
      createHeaderDash('home', 'Dashboard', 'Tools available');
      ?>
      <!-- header section end -->

      <!-- form content -->
      <div class="row">
        <div class="col-md-5 m-2 shadow">
          <canvas id="ageAreaChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-12 m-2"></div>
      </div>
    </div>
  </div>

  <script>
    // Data from PHP
    var areaData = <?php echo $js_area_data; ?>;

    // Create the Area Chart
    var ctxArea = document.getElementById('ageAreaChart').getContext('2d');
    var ageAreaChart = new Chart(ctxArea, {
      type: 'line', // Line chart type with filled area
      data: {
        datasets: [{
          label: 'Age vs Insurance Code Length',
          data: areaData,
          fill: true, // Fill the area under the line
          backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color of the filled area
          borderColor: 'rgba(75, 192, 192, 1)', // Color of the line
          borderWidth: 2,
          pointRadius: 5
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Area Chart - Age vs Insurance Code Length'
          }
        },
        scales: {
          x: {
            type: 'linear', // Explicitly set the x-axis type to linear for numerical data
            beginAtZero: false, // Start from the lowest age value instead of 0
            title: {
              display: true,
              text: 'Age'
            }
          },
          y: {
            beginAtZero: true,
            title: {
              display: true,
              text: 'Insurance Code Length'
            }
          }
        }
      }
    });
  </script>
</body>

</html>