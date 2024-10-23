<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 0);
// Database connection details for the source database
$source_host = 'localhost';
$source_user = 'root';
$source_pass = 'raymond1';
$source_db = 'jaramanew2';

// Database connection details for the target database
$target_db = 'jaramanew1';

// Connect to the source database
$source_conn = new mysqli($source_host, $source_user, $source_pass, $source_db);
if ($source_conn->connect_error) {
    die("Connection to source database failed: " . $source_conn->connect_error);
}

// Connect to the target database
$target_conn = new mysqli($source_host, $source_user, $source_pass, $target_db);
if ($target_conn->connect_error) {
    die("Connection to target database failed: " . $target_conn->connect_error);
}

//diag_client
if(isset($_POST['merge']) && $_POST['table']=='diag_client'){
    $date=$_POST['date'];
    $table=$_POST['table'];
    $source_sql = "SELECT * FROM diag_client WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $client_id = $row['client_id'];
            $diag_id = $row['diag_id'];
            $diag_id_sec = $row['diag_id_sec'];
            $date = $row['date'];
            $ref = $row['ref'];
            $user = $row['user'];
            // Add other columns as needed
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT IGNORE INTO diag_client (id, client_id,diag_id,diag_id_sec,date,ref,user) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $insert_sql->bind_param('iiiisss', $id, $client_id, $diag_id, $diag_id_sec, $date, $ref, $user);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
    
}
//diag_client

//posologie
if(isset($_POST['merge']) && $_POST['table']=='posologie'){
    $date=$_POST['date'];
    $table=$_POST['table'];
    $source_sql = "SELECT * FROM posologie WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $client_id = $row['client_id'];
            $prod_id = $row['prod_id'];
            $item = $row['item'];
            $item = $row['item'];
            $posologie = $row['posologie'];
            $date = $row['date'];
            // Add other columns as needed
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT IGNORE INTO posologie (id, client_id,prod_id,item,posologie,date) VALUES (?, ?, ?, ?, ?, ?)");
            $insert_sql->bind_param('iiisss', $id, $client_id, $prod_id, $item, $posologie, $date);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
    
}
//posologie

//evaluations
if(isset($_POST['merge']) && $_POST['table']=='evaluations'){
    $date=$_POST['date'];
    $table=$_POST['table'];

    $source_sql = "SELECT * FROM evaluations WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $client_id = $row['client_id'];
            $page = $row['page'];
            $pcmid = $row['pcmid'];
            $value = $row['value'];
            $comment = $row['comment'];
            $date = $row['date'];
            $user_id = $row['user_id'];
            $cache = $row['cache'];
            // Add other columns as needed
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT INTO evaluations (id, client_id,page,pcmid,value,comment,date,user_id,cache) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");
            $insert_sql->bind_param('iiiiiissss', $id, $client_id, $page, $pcmid, $value,$comment,$date, $user_id, $cache);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
}
//evaluations

// evaluations_old
if(isset($_POST['merge']) && $_POST['table']=='evaluations_old'){
    $date=$_POST['date'];
    $table=$_POST['table'];

    $source_sql = "SELECT * FROM evaluations_old WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $mensuel = $row['mensuel'];
            $journalier = $row['journalier'];
            $client_id = $row['client_id'];
            $page = $row['page'];
            $indicator_id = $row['indicator_id'];
            $value = $row['value'];
            $comment = $row['comment'];
            $date = $row['date'];
            $user_id = $row['user_id'];
            // $cache = $row['cache'];
            $service = $row['service'];
            // Add other columns as needed
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT INTO evaluations_old (id,mensuel,journalier, client_id,page,indicator_id,value,comment,date,user_id,service) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert_sql->bind_param('iiiiiidssiii', $id, $mensuel,$journalier,$client_id, $page, $indicator_id, $value,$comment,$date, $user_id, $service);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
}
// evaluations_old

// evaluations_red
if(isset($_POST['merge']) && $_POST['table']=='evaluations_red'){
    $date=$_POST['date'];
    $table=$_POST['table'];

    $source_sql = "SELECT * FROM evaluations_red WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $client_id = $row['client_id'];
            $page = $row['page'];
            $pcmid = $row['pcmid'];
            $value = $row['value'];
            $comment = $row['comment'];
            $date = $row['date'];
            $user_id = $row['user_id'];
            // $cache = $row['cache'];
            // Add other columns as needed
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT IGNORE INTO evaluations_red (id, client_id,page,pcmid,value,comment,date,user_id) VALUES (?,?,?,?,?,?,?,?)");
            $insert_sql->bind_param('iiiidssi', $id,$client_id, $page, $pcmid, $value,$comment,$date, $user_id);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
}
// evaluations_red

// evaluations_yellow
if(isset($_POST['merge']) && $_POST['table']=='evaluations_yellow'){
    $date=$_POST['date'];
    $table=$_POST['table'];

    $source_sql = "SELECT * FROM evaluations_yellow WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $client_id = $row['client_id'];
            $page = $row['page'];
            $pcmid = $row['pcmid$pcmid'];
            $value = $row['value'];
            $comment = $row['comment'];
            $date = $row['date'];
            $user_id = $row['user_id'];
            // $cache = $row['cache'];
            // Add other columns as needed
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT INTO evaluations_yellow (id, client_id,page,pcmid,value,comment,date,user_id) VALUES (?, ?, ?, ?, ?, ?, ?,?,?)");
            $insert_sql->bind_param('iiiidssi', $id,$client_id, $page, $pcmid, $value,$comment,$date, $user_id);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
}
// evaluations_yellow

// lab_results
if(isset($_POST['merge']) && $_POST['table']=='lab_results'){
    $date=$_POST['date'];
    $table=$_POST['table'];

    $source_sql = "SELECT * FROM lab_results WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $test_id = $row['test_id'];
            $client_id = $row['client_id'];
            $exam_id = $row['exam_id'];
            $pos_neg_result = $row['pos_neg_result'];
            $service = $row['service'];
            $exam = $row['exam'];
            $comment = $row['comment'];
            $date = $row['date'];
            $time = $row['time'];
            $lab_tech = $row['lab_tech'];
            $done = $row['done'];
            // $cache = $row['cache'];
            // Add other columns as needed
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT IGNORE INTO lab_results (test_id, client_id,exam_id,pos_neg_result,service,exam,comment,date,time,lab_tech,done) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $insert_sql->bind_param('iiiiissssii', $test_id,$client_id, $exam_id, $pos_neg_result, $service,$exam,$comment,$date, $time, $lab_tech,$done);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
}
// lab_results

// orders
if(isset($_POST['merge']) && $_POST['table']=='orders'){
    $date=$_POST['date'];
    $table=$_POST['table'];

    $source_sql = "SELECT * FROM orders WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $order_id = $row['order_id'];
            $client_id = $row['client_id'];
            $voucher_no = $row['voucher_no'];
            $item = $row['item'];
            $type = $row['type'];
            $quantity = $row['quantity'];
            $unityp = $row['unityp'];
            $cases = $row['cases'];
            $service = $row['service'];
            $time = $row['time'];
            $period = $row['period'];
            $date = $row['date'];
            $status = $row['status'];
            $insured = $row['insured'];
            $user = $row['user'];
            $verified = $row['verified'];
            $total = $row['total'];
            $done = $row['done'];
            $printed = $row['printed'];
            $verifier = $row['verifier'];
            $checked = $row['checked'];
            $cache = $row['cache'];
            // Add other columns as needed
            // order_id
            // client_id
            // voucher_no
            // voucher_rssb
            // item
            // type
            // quantity
            // unityp
            // cases
            // service
            // time
            // period
            // date
            // status
            // insured
            // user
            // verified
            
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT INTO orders (order_id, client_id,voucher_no,item,type,quantity,unityp,cases,service,time,period,date,status, insured, user, verified, total, done, printed, verifier, checked, cache) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert_sql->bind_param('isiissidiissssssiiiisiii', $order_id,$client_id, $voucher_no, $item, $type,$quantity,$unityp, $cases, $service,$time,$period,$date,$status,$insured,$user,$verified,$total,$done,$printed,$verifier,$checked,$cache);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
}
// orders

// clients
if(isset($_POST['merge']) && $_POST['table']=='clients'){
    $date=$_POST['date'];
    $table=$_POST['table'];

    $source_sql = "SELECT * FROM clients WHERE date LIKE '%$date%'";
    $result = $source_conn->query($source_sql);
    
    if ($result->num_rows > 0) {
        // Insert data into the target database
        while ($row = $result->fetch_assoc()) {
            $client_id = $row['client_id'];
            $district = $row['district'];
            $section = $row['section$section'];
            $sector = $row['sector'];
            $cellule = $row['cellule'];
            $insurance = $row['insurance'];
            $insurance_code = $row['insurance_code'];
            $categorie = $row['categorie'];
            $famille = $row['famille'];
            $chef = $row['chef'];
            $beneficiary = $row['beneficiary'];
            $serie = $row['serie'];
            $adherent = $row['adherent'];
            $department_aff = $row['department_aff'];
            $age = $row['age'];
            $sex = $row['sex'];
            $police = $row['police'];
            $date = $row['date'];
            $mois = $row['mois'];
            $time = $row['time'];
            $user = $row['user'];
            $village = $row['village'];
            $cache_opd = $row['cache_opd'];
            $prisoner = $row['prisoner'];
            $disability = $row['disability'];
            // Add other columns as needed
    
            // Prepare the insert statement for the target database
            $insert_sql = $target_conn->prepare("INSERT INTO clients (client_id,district, section$section,sector,cellule,insurance,insurance_code,categorie,famille,chef,beneficiary,serie,adherent, department_aff, age, sex, police, date,mois, time, user, village,cache_opd,prisoner,disability) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $insert_sql->bind_param('ississssssssssssssssssiss', $client_id,$district, $section, $sector, $cellule,$insurance,$insurance_code, $categorie, $famille,$chef,$beneficiary,$serie,$adherent,$department_aff,$age,$sex,$police,$date,$mois,$time,$user,$village,$cache_opd,$prisoner,$disability);
            // Bind other columns as needed
    
            if (!$insert_sql->execute()) {
                echo "Error inserting data: " . $insert_sql->error;
            }
        }
    }
}
// clients

header('Location: check.php?table='.$table.'&date='.$date);

?>
