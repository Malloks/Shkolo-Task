<?php
// Database connection setup
$host = 'localhost';
$db = 'your_database';
$user = 'your_username';
$pass = 'your_password';

$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);

// Collect POST data
$title = $_POST['title'];
$url = $_POST['url'];
$color = $_POST['color'];
$buttonIndex = $_POST['button-index'];

// Prepare SQL statement
$sql = "INSERT INTO button_configurations (button_index, title, url, color) VALUES (:button_index, :title, :url, :color) ON DUPLICATE KEY UPDATE title = :title, url = :url, color = :color";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':button_index' => $buttonIndex,
    ':title' => $title,
    ':url' => $url,
    ':color' => $color
]);

echo "Button configuration updated successfully.";
?>