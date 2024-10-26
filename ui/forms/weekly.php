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
      require "sections/manage_weekly.php";
      createHeaderDash('home', 'IDSR', 'Weekly Reporting Form');
      ?>
      <!-- header section end -->

      <!-- form content -->
      <div class="row">
        <div class="col-md-12 p-3">
          <h2 class="text-center">IDSR Weekly Reporting Form</h2>
          <table class="m-2" style="width: 100%;" border="1">
            <?php
            td_three(1, 'Facility Name', '');
            td_three(2, 'Year of Reporting', '');
            td_three(3, 'Epidemiological week', '');
            ?>
          </table>
          <table class="m-2" style="width: 100%;" border="1">
            <?php
            th_four('', 'Diseases', 'Cases', 'Deaths');
            td_four(1, 'Flu syndrome', '', '');
            td_four(2, 'Non bloody Diarrhoea under 5yrs', '', '');
            td_four(3, 'Simple Malaria', '', '');
            td_four(4, 'Severe pneumonia under 5yrs', '', '');
            td_four(5, 'Brucellosis', '', '');
            td_four(6, 'COVID-19', '', '');
            td_four(7, 'Rabies exposure (Dog/mammals bite)', '', '');
            td_four(8, 'Trypanosomiasis', '', '');
            ?>
          </table>
          <table class="m-2" style="width: 100%;" border="1">
            <?php
            th_head('Summary of Immediate Reportable Diseases Cases and Deaths (Reported the same week of reporting)');
            th_four('', 'Disease', 'Cases', 'Deaths');
            td_four(1, 'Acute hemorrhagic fever syndrome Ebola', '', '');
            td_four('', 'Acute hemorrhagic fever syndrome Marburg', '', '');
            td_four('', 'Acute hemorrhagic fever syndrome Crimean Congo', '', '');
            td_four('', 'Acute hemorrhagic fever syndrome Lassa Fever', '', '');
            td_four(2, 'Anthrax', '', '');
            td_four(3, 'Bacterial Meningitis', '', '');
            td_four(4, 'Chikungunya', '', '');
            td_four(5, 'Cholera', '', '');
            td_four(6, 'Dengue', '', '');
            td_four(7, 'Diarrhea with bloody (Shigellosis)', '', '');
            td_four(8, 'Dracunculiasis (Guinea Worm disease)', '', '');
            td_four(9, 'Epidemic Typhus', '', '');
            td_four(10, 'Foodborne illnesses', '', '');
            td_four(11, 'Human influenza due to a new subtype', '', '');
            td_four(12, 'Human Rabies', '', '');
            td_four(13, 'Measles', '', '');
            td_four(14, 'Neonatal tetanus', '', '');
            td_four(15, 'Plague', '', '');
            td_four(16, 'Public health event of international or national concern', '', '');
            td_four(17, 'Rift valley fever', '', '');
            td_four(18, 'Rubella', '', '');
            td_four(19, 'SARI', '', '');
            td_four(20, 'SARS', '', '');
            td_four(21, 'Severe Malaria', '', '');
            td_four(22, 'Smallpox', '', '');
            td_four(23, 'Snake bite', '', '');
            td_four(24, 'Typhoid fever', '', '');
            td_four(25, 'Unknown disease/event/condition', '', '');
            td_four(26, 'Yaws or endemic syphilis or bejel', '', '');
            td_four(27, 'Yellow fever', '', '');
            td_four(28, 'Zika virus disease', '', '');
            td_four(29, 'Maternal death', '', '');
            td_four(30, 'Perinatal death', '', '');
            td_four(31, 'Under 5 death', '', '');

            ?>
          </table>
          <table class="m-2" style="width: 100%;" border="1">
            <?php
            td_last_four('Prepared by', '', 'Date', '');
            td_last_four('Verified by', '', 'Date', '');
            td_last_four('Name of head of health facility (with stamp)', '', 'Date', '');

            ?>
          </table>
        </div>
      </div>

    </div>
  </div>
</body>

</html>