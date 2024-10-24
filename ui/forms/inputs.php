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
        <div class="col-md-5 m-3">
          <h2 class="text-center">Inputs</h2>
          <form action="../php/insert.php" method="POST">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name" required><br><br>

            <label for="email">Email:</label>
            <input class="form-control" type="email" name="email" id="email" required><br><br>

            <label for="age">Age:</label>
            <input class="form-control" type="number" name="age" id="age" required><br><br>

            <button class="btn btn-info" type="submit">Submit</button>
          </form>
        </div>
        <div class="col-md-5">
          <h2 class="text-center">Output</h2>
        </div>
      </div>

    </div>
  </div>
</body>

</html>