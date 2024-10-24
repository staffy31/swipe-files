<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get input values from the form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $age = intval($_POST['age']);

    // New data to be added
    $new_data = array(
        'name' => $name,
        'email' => $email,
        'age' => $age
    );

    // Path to your JSON file
    $file = '../../data/data.json';

    // Step 1: Read the existing JSON file
    if (file_exists($file)) {
        $json_data = file_get_contents($file);
        $data = json_decode($json_data, true);
    } else {
        $data = array();  // Create an empty array if the file does not exist
    }

    // Step 2: Add new data to the array
    $data[] = $new_data;

    // Step 3: Encode the array back to JSON format
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Step 4: Write the updated JSON data back to the file
    if (file_put_contents($file, $json_data)) {
        echo "Data successfully added to JSON file.";
    } else {
        echo "Error writing to JSON file.";
    }
} else {
    echo "Invalid request.";
}
?>
