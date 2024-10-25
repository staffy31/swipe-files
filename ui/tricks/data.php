<?php
ini_set('memory_limit', '500M');
ini_set('max_execution_time', 0);
// Database connection details for the source database
$source_host = 'localhost';
$source_user = 'root';
$source_pass = '';
$source_db = '';

// Database connection details for the target database
$target_db = '';

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


header('Location: check.php?table='.$table.'&date='.$date);

?>
