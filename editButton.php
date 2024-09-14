<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $buttonIndex = intval($_POST['button-index']);
    $title = pg_escape_string($_POST['title']);
    $url = pg_escape_string($_POST['url']);
    $color = pg_escape_string($_POST['color']);

    // Check if button exists
    $query = "SELECT * FROM buttons WHERE id = $buttonIndex";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) > 0) {
        // Update existing button
        $query = "UPDATE buttons SET title = '$title', url = '$url', color = '$color' WHERE id = $buttonIndex";
    } else {
        // Insert new button
        $query = "INSERT INTO buttons (id, title, url, color) VALUES ($buttonIndex, '$title', '$url', '$color')";
    }

    $result = pg_query($conn, $query);

    if ($result) {
        echo "Button configuration saved successfully!";
    } else {
        echo "Error saving button configuration: " . pg_last_error();
    }
}
?>
