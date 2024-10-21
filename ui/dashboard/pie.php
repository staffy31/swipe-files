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
          <canvas id="insurancePieChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-5 m-2 shadow">
          <canvas id="insuranceBarChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-5 m-2 shadow">
          <canvas id="insuranceDoughnutChart" width="800" height="400"></canvas>
        </div>

        <div class="col-md-12 m-2"></div>

        <?php
        // Sample data from the JSON

        $data = [
          ["client_id" => "1", "age" => 25, "date" => "2024-01-01","insurance" => "AtLife"],
          ["client_id" => "2", "age" => 30, "date" => "2024-02-01","insurance" => "AXA"],
          ["client_id" => "3", "age" => 35, "date" => "2024-03-01","insurance" => "SunLife"],
          ["client_id" => "4", "age" => 40, "date" => "2024-04-01","insurance" => "AtLife"],
          ["client_id" => "5", "age" => 45, "date" => "2024-05-01","insurance" => "AXA"],
          ["client_id" => "6", "age" => 50, "date" => "2024-06-01","insurance" => "SunLife"],
          ["client_id" => "7", "age" => 55, "date" => "2024-07-01","insurance" => "AtLife"],
          ["client_id" => "8", "age" => 60, "date" => "2024-08-01","insurance" => "AXA"],
          ["client_id" => "9", "age" => 65, "date" => "2024-09-01","insurance" => "SunLife"],
          ["client_id" => "10", "age" => 70, "date" => "2024-10-01","insurance" => "AtLife"]
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

    // Create the bar chart
    var ctxBar = document.getElementById('insuranceBarChart').getContext('2d');
    var insuranceBarChart = new Chart(ctxBar, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Number of Clients',
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
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Insurance Distribution - Bar Chart'
          }
        }
      }
    });


    // Create the doughnut chart
    var ctxDoughnut = document.getElementById('insuranceDoughnutChart').getContext('2d');
    var insuranceDoughnutChart = new Chart(ctxDoughnut, {
      type: 'doughnut',
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
            text: 'Insurance Distribution - Doughnut Chart'
          }
        }
      }
    });

    // Create the scatter chart
    var ctxScatter = document.getElementById('insuranceScatterChart').getContext('2d');
    var insuranceScatterChart = new Chart(ctxScatter, {
      type: 'scatter',
      data: {
        datasets: [{
          label: 'Client ID vs Age',
          data: scatterData,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          x: {
            type: 'linear',
            position: 'bottom',
            title: {
              display: true,
              text: 'Client ID'
            }
          },
          y: {
            title: {
              display: true,
              text: 'Age'
            }
          }
        },
        plugins: {
          title: {
            display: true,
            text: 'Scatter Chart - Age vs Client ID'
          }
        }
      }
    });

  </script>
</body>

</html>