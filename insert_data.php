<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = pg_escape_string($_POST['username']);
    $email = pg_escape_string($_POST['email']);

    $query = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data: " . pg_last_error();
    }
}
?>