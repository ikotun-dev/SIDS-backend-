<?php

require_once __DIR__ . '/config.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $age = $_POST['age'];

        //create new db instance
        $db = new Connect();

        $query = $db->prepare('INSERT INTO users (name, age) VALUES (:username, :age)');
        $query->bindParam(':username', $username);
        $query->bindParam(':age', $age);

        $query->execute();
        //get the lastinserted Id 
        $insertedID = $db->lastInsertId();
        if ($insertedID) {
            echo 'Data was inserted succeffully ' . $insertedID;
        } else {
            echo json_encode('DATA couldnt not be inserted');
        }


    }
}
catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
?>