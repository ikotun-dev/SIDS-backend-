<?php

// Enable CORS headers
header("Access-Control-Allow-Origin: *"); // Replace * with the appropriate origin URL if needed
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Return response for preflight requests
    header('HTTP/1.1 200 OK');
    exit();
}

class Connect extends PDO
{
    public function __construct()
    {
        parent::__construct(
            "mysql:host=localhost;dbname=api",
            'root',
            '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
?>

