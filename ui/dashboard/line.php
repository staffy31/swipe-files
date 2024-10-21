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
        <div class="col-md-5 m-2 shadow">
          <canvas id="ageLineChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-12 m-2"></div>

        <?php
        // Sample JSON data (provided earlier) for the clients
        $data = [
          ["client_id" => "1", "age" => 25, "date" => "2024-01-01"],
          ["client_id" => "2", "age" => 30, "date" => "2024-02-01"],
          ["client_id" => "3", "age" => 35, "date" => "2024-03-01"],
          ["client_id" => "4", "age" => 40, "date" => "2024-04-01"],
          ["client_id" => "5", "age" => 85, "date" => "2024-05-01"],
          ["client_id" => "6", "age" => 50, "date" => "2024-06-01"],
          ["client_id" => "7", "age" => 55, "date" => "2024-07-01"],
          ["client_id" => "8", "age" => 10, "date" => "2024-01-01"],
          ["client_id" => "9", "age" => 65, "date" => "2024-09-01"],
          ["client_id" => "10", "age" => 70, "date" => "2024-10-01"]
        ];

        // Prepare data for Line Chart
        $dates = [];
        $ages = [];

        foreach ($data as $entry) {
          $dates[] = $entry["date"];  // X-axis data (dates)
          $ages[] = (int)$entry["age"];  // Y-axis data (ages)
        }

        // Prepare the PHP data for JavaScript
        $js_dates = json_encode($dates);
        $js_ages = json_encode($ages);
        ?>
      </div>
    </div>
  </div>
  <script>
    // Data from PHP
    var dates = <?php echo $js_dates; ?>;
    var ages = <?php echo $js_ages; ?>;

    // Create the Line Chart
    var ctxLine = document.getElementById('ageLineChart').getContext('2d');
    var ageLineChart = new Chart(ctxLine, {
      type: 'line',
      data: {
        labels: dates, // X-axis labels (dates)
        datasets: [{
          label: 'Age over Time',
          data: ages, // Y-axis data (ages)
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2,
          fill: true,
          tension: 0.4 // Make the line smooth
        }]
      },
      options: {
        responsive: true,
        plugins: {
          title: {
            display: true,
            text: 'Age Trend over Time'
          }
        },
        scales: {
          x: {
            title: {
              display: true,
              text: 'Date'
            }
          },
          y: {
            title: {
              display: true,
              text: 'Age'
            },
            beginAtZero: true
          }
        }
      }
    });

  </script>
</body>

</html>