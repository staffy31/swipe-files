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
// Sample JSON data for scatter plot (age vs. insurance code length)
$data = [
    ["client_id" => "1", "age" => 25, "insurance_code" => "19900484036"],
    ["client_id" => "2", "age" => 30, "insurance_code" => "189900494034"],
    ["client_id" => "3", "age" => 35, "insurance_code" => "189500484136"],
    ["client_id" => "4", "age" => 40, "insurance_code" => "189936"],
    ["client_id" => "5", "age" => 45, "insurance_code" => "189900484056"],
    ["client_id" => "6", "age" => 50, "insurance_code" => "189900481236"],
    ["client_id" => "7", "age" => 55, "insurance_code" => "189900416"],
    ["client_id" => "8", "age" => 60, "insurance_code" => "189900484936"],
    ["client_id" => "9", "age" => 65, "insurance_code" => "100484036"],
    ["client_id" => "10", "age" => 70, "insurance_code" => "189900481136"]
];

// Prepare data for Scatter Chart
$scatter_data = [];
foreach ($data as $entry) {
    $scatter_data[] = [
        "x" => (int)$entry["age"],  // Client's age (numerical value for x-axis)
        "y" => strlen($entry["insurance_code"])  // Length of insurance code for y-axis
    ];
}

// Prepare the PHP data for JavaScript
$js_scatter_data = json_encode($scatter_data);
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
          <canvas id="ageScatterChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-12 m-2"></div>
      </div>
    </div>
  </div>
  <script>
    // Data from PHP
    var scatterData = <?php echo $js_scatter_data; ?>;

    // Create the Scatter Chart
    var ctxScatter = document.getElementById('ageScatterChart').getContext('2d');
    var ageScatterChart = new Chart(ctxScatter, {
      type: 'scatter',
      data: {
        datasets: [{
          label: 'Age vs Insurance Code Length',
          data: scatterData,
          backgroundColor: 'rgba(75, 192, 192, 0.5)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2,
          pointRadius: 5
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Scatter Chart - Age vs Insurance Code Length'
          }
        },
        scales: {
          x: {
            beginAtZero: true,
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