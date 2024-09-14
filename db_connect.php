<?php
$host = 'localhost'; // Adjust as needed
$port = '5432'; // Adjust as needed
$dbname = 'your_database_name'; // Replace with your database name
$user = 'your_database_user'; // Replace with your database username
$password = 'your_database_password'; // Replace with your database password

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>