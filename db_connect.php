<?php
$host = 'your_actual_host';        // Replace with your PostgreSQL host
$port = '5432';                    // Default PostgreSQL port
$dbname = 'your_database_name';    // Replace with your database name
$user = 'your_database_user';      // Replace with your database username
$password = 'your_database_password'; // Replace with your database password

// Create a connection string
$connectionString = "host=$host port=$port dbname=$dbname user=$user password=$password";

// Attempt to connect to the database
$conn = pg_connect($connectionString);

// Check if the connection was successful
if (!$conn) {
    die("Error in connection: " . pg_last_error());
}
?>