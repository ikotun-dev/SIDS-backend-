<?php
require_once __DIR__ . '/config.php';

// API endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve username and age from the request body
    $username = $_POST['username'];
    $age = $_POST['age'];

    // Create a new instance of the Connect class
    $db = new Connect();

    // Prepare and execute the query
    $query = $db->prepare('SELECT * FROM users WHERE name = :username AND age = :age');
    $query->bindParam(':username', $username);
    $query->bindParam(':age', $age);
    $query->execute();

    // Check if the query returned any rows
    $response = array();
    if ($query->rowCount() > 0) {
        // User exists in the database
        $response['message'] = 'User exists in the database.';
    } else {
        // User does not exist in the database
        $response['message'] = 'User does not exist in the database.';
    }

    // Set response headers and echo the response in JSON format
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Invalid request method
    $response = array('message' => 'Invalid request method.');
    
    // Set response headers and echo the response in JSON format
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

