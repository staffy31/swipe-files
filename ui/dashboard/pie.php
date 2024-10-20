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
        <div class="col-md-4">
          <canvas id="insurancePieChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-12"></div>

        <?php
        // Sample data from the JSON
        $data = [
          ["client_id" => "1", "insurance" => "AtLife"],
          ["client_id" => "2", "insurance" => "AXA"],
          ["client_id" => "3", "insurance" => "SunLife"],
          ["client_id" => "4", "insurance" => "AtLife"],
          ["client_id" => "5", "insurance" => "AXA"],
          ["client_id" => "6", "insurance" => "SunLife"],
          ["client_id" => "7", "insurance" => "AtLife"],
          ["client_id" => "8", "insurance" => "AXA"],
          ["client_id" => "9", "insurance" => "SunLife"],
          ["client_id" => "10", "insurance" => "AtLife"]
        ];

        // Count the occurrences of each insurance company
        $insurance_counts = [];
        foreach ($data as $entry) {
          $insurance = $entry["insurance"];
          if (isset($insurance_counts[$insurance])) {
            $insurance_counts[$insurance]++;
          } else {
            $insurance_counts[$insurance] = 1;
          }
        }

        // Prepare data for JavaScript
        $insurance_labels = json_encode(array_keys($insurance_counts));
        $insurance_values = json_encode(array_values($insurance_counts));
        ?>
      </div>
    </div>
  </div>
  <script>
    // Get the data passed from PHP
    var labels = <?php echo $insurance_labels; ?>;
    var data = <?php echo $insurance_values; ?>;

    // Create the pie chart
    var ctx = document.getElementById('insurancePieChart').getContext('2d');
    var insurancePieChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          label: 'Insurance Distribution',
          data: data,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Insurance Distribution Pie Chart'
          }
        }
      }
    });
  </script>
</body>

</html>