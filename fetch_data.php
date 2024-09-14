<?php
include 'db_connect.php'; // Include the database connection

$query = "SELECT * FROM users";
$result = pg_query($conn, $query);

$data = [];

while ($row = pg_fetch_assoc($result)) {
    $data[] = $row;
}

// Send data back as JSON
echo json_encode($data);
?>
