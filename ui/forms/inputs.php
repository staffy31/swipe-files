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
// Path to the JSON file
$file = '../../data/data.json';

// Step 1: Check if the file exists and read its content
if (file_exists($file)) {
  $json_data = file_get_contents($file);
  $data = json_decode($json_data, true); // Decode the JSON file to an associative array
} else {
  $data = array(); // If the file doesn't exist, initialize an empty array
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
        <div class="col-md-5 m-3">
          <h2 class="text-center">Data from JSON File</h2>

          <?php if (!empty($data)): ?>
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Age</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data as $entry): ?>
                  <tr>
                    <td><?php echo htmlspecialchars($entry['name']); ?></td>
                    <td><?php echo htmlspecialchars($entry['email']); ?></td>
                    <td><?php echo htmlspecialchars($entry['age']); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <p>No data found in the JSON file.</p>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</body>

</html>