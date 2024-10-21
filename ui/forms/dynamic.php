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
        <div class="col-md-6 m-3 shadow">
          <h3>Select option dynamicaly</h3>
          <label for="country">Country: </label>
          <select class="form-control" id="country" onchange="loadCities()">
            <option value="">Select Country</option>
          </select>

          <label for="city">City: </label>
          <select class="form-control" id="city" onchange="loadDistricts()">
            <option value="">Select City</option>
          </select>

          <label for="district">District: </label>
          <select class="form-control mb-2" id="district">
            <option value="">Select District</option>
          </select>
        </div>
      </div>

    </div>
  </div>
  <script src="../../js/dynamic-select.js"></script>

</body>

</html>