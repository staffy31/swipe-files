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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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

  <?php
  // Database connection parameters
  $servername = "localhost";
  $username = "root";
  $password = "raymond1";
  $receiver = "gatenga";

  $sender = "gatenganew2";

  $conn = new mysqli($servername, $username, $password);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  function db_Name($conn,$receiver){
    $conn->select_db($receiver);
    $sql = "SELECT DATABASE()";
    $result = $conn->query($sql);
    if ($result) {
      $row = $result->fetch_assoc();
      echo  strtoupper($row['DATABASE()']);
    } else {
      echo "Error: " . $conn->error;
    }
    // $conn->close();
  }

  function records($servername, $username, $password, $receiver, $table, $start_date,$tab_id){
    $link = new mysqli($servername, $username, $password, $receiver);
    $count_query = "SELECT COUNT(*) AS record_count FROM $table WHERE date LIKE '%$start_date%'";
    $count_result = $link->query($count_query);
    $id_query = "SELECT MIN($tab_id) AS first_id, MAX($tab_id) AS last_id FROM $table WHERE date LIKE '%$start_date%'";
    $id_result = $link->query($id_query);
    if ($count_result && $id_result) {
      $count_row = $count_result->fetch_assoc();
      $id_row = $id_result->fetch_assoc();
      ?>
        <span class="mx-2 p-4 bg-info rounded">First ID : <font color=white size=+2><?= $id_row['first_id'];?></font></span>
        <span class="mx-2 p-4 bg-info rounded">Last ID : <font color=white size=+2><?= $id_row['last_id'];?></font></span>
        <span class="mx-2 p-4 bg-info rounded">RECORDS : <font color=white size=+2><?= $count_row['record_count'];?></font></span>

      <?php
    }
  }
  ?>

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
        <form action="" method="POST" class="d-flex">
          <div class="form-group m-2">
            <label for="tabl">Select table</label>
            <select class="form-control" name="table" id="tabl">
              <option value="orders">Orders</option>
              <option value="clients">Clients</option>
              <option value="evaluations_old">Evaluations old</option>
              <option value="evaluations">Evaluations pcmi</option>
              <option value="evaluations_yellow">Evaluations yellow</option>
              <option value="evaluations_red">Evaluations red</option>
              <option value="posologie">Posologie</option>
              <option value="diag_client">Diag Client</option>
              <option value="lab_results">Lab Results</option>
            </select>
          </div>
          <div class="form-group m-2">
            <label for="dat">write period (ex:2023-01)</label>
            <input type="text" class="form-control" name="date" id="dat" placeholder="Enter text">
          </div>
          <div class="form-group m-2">
            <label for="inputText1">&nbsp;</label>
            <button type="submit" class="btn btn-primary btn-block">OK</button>
          </div>

        </form>
      </div>
      <div class="row">
        <div class="col-md-5 my-2">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center my-2 p-4 bg-light shadow rounded"><b>Sender</b> Table : <?php if(isset($_POST['table'])) { echo strtoupper($_POST['date']);$date= $_POST['date'];}else{$date= $_GET['date'];}?></div>
                <div class="col-md-4"></div>
                <div class="col-md-12 my-3">
                  <label for=""><?php db_Name($conn,$sender);?>: <?php if(isset($_POST['table'])) { echo strtoupper($_POST['table']); $table= $_POST['table']; }else{$table= $_GET['table'];}?></label>
                </div>
                <div class="col-md-12 d-flex">
                  <?php 
                  if($table == 'orders')
                  records($servername, $username, $password, $sender, $table, $date, 'order_id');
                  elseif($table == 'clients')
                  records($servername, $username, $password, $sender, $table, $date, 'client_id');
                  elseif($table == 'lab_results')
                  records($servername, $username, $password, $sender, $table, $date, 'test_id');
                  else
                  records($servername, $username, $password, $sender, $table, $date, 'id');
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2 d-flex align-items-center justify-content-center">
          <form action="data.php" method="post">
            <input type="hidden" name="table" value="<?php if(isset($_POST['table'])) { echo $_POST['table'];$date= $_POST['table'];}else{echo $_GET['table'];$date= $_GET['table'];}?>" id="">
            <input type="hidden" name="date" value="<?php if(isset($_POST['table'])) { echo $_POST['date'];$date= $_POST['date'];}else{echo$_GET['date'];$date= $_GET['date'];}?>" id="">
            <button type="submit" name="merge" class="btn btn-secondary px-5">
              <i class="bi-send-arrow-down" style="font-size: 2rem; color: white;"></i>
            </button>
          </form>
        </div>
        <div class="col-md-5 my-2">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 text-center my-2 p-4 bg-light shadow rounded"><b>Receiver</b> Table : <?php if(isset($_POST['table'])) { echo $_POST['date'];$date= $_POST['date'];}else{$date= $_GET['date'];}?></div>
                <div class="col-md-4"></div>
                <div class="col-md-12 my-3">
                  <label for=""><?php db_Name($conn,$receiver);?> : <?php if(isset($_POST['table'])) { echo strtoupper($_POST['table']); $table= $_POST['table']; }else{$table= $_GET['table'];}?></label>
                </div>
                <div class="col-md-12 d-flex">
                  <?php 
                  if($table == 'orders')
                  records($servername, $username, $password, $receiver, $table, $date, 'order_id');
                  elseif($table == 'clients')
                  records($servername, $username, $password, $receiver, $table, $date, 'client_id');
                  elseif($table == 'lab_results')
                  records($servername, $username, $password, $receiver, $table, $date, 'test_id');
                  else
                  records($servername, $username, $password, $receiver, $table, $date, 'id');
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>