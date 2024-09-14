<?php
// Replace with your actual database credentials
$host = 'localhost';
$port = '5432'; // Default PostgreSQL port
$dbname = 'your_database_name';
$user = 'your_database_user';
$password = 'your_database_password';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>