<?php
$host = 'your_host';        // E.g., 'localhost' or IP address
$port = '5432';             // Default PostgreSQL port
$dbname = 'your_database_name'; // Your database name
$user = 'your_database_user';   // Your database username
$password = 'your_database_password'; // Your database password

// Create a connection string
$connectionString = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Attempt to connect to the database
$conn = pg_connect($connectionString);

// Check if the connection was successful
if (!$conn) {
    die("Error in connection: " . pg_last_error());
}
?>