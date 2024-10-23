<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Dashboard - Home</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <link href="../dist/css/icons/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
  <link href="../dist/css/icons/material-design-iconic-font/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="../dist/css/icons/themify-icons/themify-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/sidenav.css">
  <link rel="stylesheet" href="../css/home.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('../images/bg.png');
      background-size: cover;
      background-attachment: fixed;
      font-family: 'Arial', sans-serif;
    }
  </style>
</head>

<body>
  <?php include "../menu/side/sections/sidenav.html"; ?>
  <div class="container-fluid">
    <div class="container">
      <!-- header section -->
      <?php
      require "../php/header.php";
      createHeaderDash('home', 'Dashboard', 'Tools available');
      ?>
      <!-- header section end -->

      <!-- form content -->
      <div class="card" style="overflow: auto;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-9">
              <form action="" method="post">
                <div class="row ">
                  <div class="col-md-1 bg-light text-dark p-2">
                    Period:
                  </div>
                  <div class="col-md-2">
                    <?php
                    $json_file_path = '../data/revenues.json';
                    echo '<select class="form-control mx-2" style="width:230px;" name="periode">';

                    if (file_exists($json_file_path)) {
                      $json_data = file_get_contents($json_file_path);

                      $data = json_decode($json_data, true);

                      if (!empty($data)) {
                        $periods = array_unique(array_column($data, 'period'));

                        foreach ($periods as $period) {
                          echo '<option value="' . $period . '">' . $period . '</option>';
                        }
                      } else {
                        echo 'No data found in the JSON file.';
                      }
                    } else {
                      echo 'JSON file not found.';
                    }
                    echo '</select>';

                    ?>

                  </div>
                  <div class="col-md-2 mx-3">
                    <button class="btn btn-primary" type="submit" name="submit" value="submit">OK</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-md-12">
              <table class="text-dark" width="100%" height="194" border="1" cellpadding="0" cellspacing="0">
                <tr>
                  <th class="text-center" colspan="17">
                    <?php if (isset($_POST['periode'])) {
                      echo $periodz = $_POST['periode'];
                    } else{
                      $periodz = date("F-Y");
                    }
                    ?>
                  </th>
                </tr>
                <tr>
                  <?php
                  cost_header('Assurances', 180, '#FFF');
                  cost_header('COST FOR CONSULTATION', 50, '#ccc');
                  cost_header('COST FOR LABORATORY TESTS', 50, '#ccc');
                  cost_header('COST FOR MEDICAL IMAGING', 50, '#ccc');
                  cost_header('COST FOR HOSPITALISATION', 50, '#ccc');
                  cost_header('COST FOR OTHERS CONSUMABLES', 50, '#ccc');
                  cost_header('COST FOR AMBULANCES ', 50, '#ccc');
                  cost_header('COST FOR MEDECINES', 50, '#ccc');
                  cost_header('TOTAL AMOUNT', 50, '#ccc');
                  cost_header('15% TOTAL AMOUNT', 50, '#ccc');
                  cost_header('85% TOTAL AMOUNT', 50, '#ccc');
                  function cost_header($title, $width, $bgcolor)
                  {
                    echo '<th bgcolor=' . $bgcolor . ' class="p-2" width="' . $width . '%">' . $title . '</th>';
                  }
                  ?>
                </tr>
                <tr>
                  <?php
                  cost_calculation($data, $periodz, 'PRIVE');

                  ?>
                </tr>
                <tr>
                  <?php
                  cost_calculation($data, $periodz, 'RTB');

                  ?>
                </tr>
                <tr>
                  <?php
                  cost_calculation($data, $periodz, 'MM INSU');

                  ?>
                </tr>
                <tr>
                  <?php
                  cost_calculation($data, $periodz, 'KAIM');

                  ?>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php
  // Load the JSON file data
  function load_json_data($file_path)
  {
    $json_data = file_get_contents($file_path);
    return json_decode($json_data, true);  // Convert JSON to associative array
  }

  function cost_calculation($data, $defperiod, $insu)
  {
    echo '<td class="p-2">' . $insu . '</td>';
    echo '<td class="p-2">' . calculate($data, 'consultation', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, 'laboratoire', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, '', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, 'hospitalisation', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, 'medical', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, 'ambulance', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, 'med', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, '', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, '', $defperiod, $insu) . '</td>';
    echo '<td class="p-2">' . calculate($data, '', $defperiod, $insu) . '</td>';
  }

  function calculate($data, $type, $defperiod, $insu)
  {
    $totc = 0;

    // Filter the JSON data based on period, insurance, and type (if provided)
    foreach ($data as $entry) {
      if ($entry['period'] == $defperiod && $entry['insurance'] == $insu && ($type == '' || $entry['type'] == $type)) {
        $totc += $entry['quantity'] * $entry['unityp'];
      }
    }

    return $totc;
  }

  // Load the JSON data from the file
  $data = load_json_data('../data/revenues.json');

  // Call the function for testing
  ?>
</body>

</html>