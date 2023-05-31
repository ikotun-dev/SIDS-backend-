<?php

// Database configuration
$host = "localhost";      // MySQL host
$username = "root";       // MySQL username
$password = "password";   // MySQL password
$database = "api";        // MySQL database name

// Establish database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if connection was successful
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
