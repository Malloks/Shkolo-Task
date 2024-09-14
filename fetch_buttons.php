<?php
include 'db_connect.php';

$query = "SELECT * FROM buttons";
$result = pg_query($conn, $query);

$buttons = [];
while ($row = pg_fetch_assoc($result)) {
    $buttons[] = $row;
}

header('Content-Type: application/json');
echo json_encode($buttons);
?>
