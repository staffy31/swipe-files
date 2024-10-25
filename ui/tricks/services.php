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
<?php
if (isset($_POST['tabl'])) {

  $folder_name = $_POST['db'];

  // Check if the folder already exists
  if (!is_dir($folder_name)) {
    // Create the folder
    if (mkdir('../../database/' . $folder_name)) {

      // echo '<input type="text" name="">';
    } else {
      // echo "Failed to create folder.";
    }
  } else {
    echo "Folder already exists.";
  }
}
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
        <div class="col-md-3 d-flex">
          <form action="services.php" method="post">
            <label for="">Database name: </label>
            <input type="text" class="form-control" name="db">&nbsp;
            <button class="btn btn-info" name="opd" style="padding-left: 30px;padding-right:30px;"><span>OK</span></button>
          </form>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-2"></div>
      </div>

    </div>
  </div>
</body>

</html>