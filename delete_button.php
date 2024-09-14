<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $buttonIndex = intval($_POST['button-index']);

    $query = "DELETE FROM buttons WHERE id = $buttonIndex";
    $result = pg_query($conn, $query);

    if ($result) {
        echo "Button deleted successfully!";
    } else {
        echo "Error deleting button: " . pg_last_error();
    }
}
?>
