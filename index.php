<?php
// Include database connection file
require 'db_connect.php';

// Fetch button configurations from the database
$sql = "SELECT * FROM button_configurations";
$result = $conn->query($sql);

$buttonConfigs = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $buttonConfigs[$row['button_index']] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Grid Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="grid-container">
        <!-- 9 Cells for buttons -->
        <?php for ($i = 1; $i <= 9; $i++): ?>
            <div class="grid-item" id="cell-<?php echo $i; ?>">
                <button class="grid-button" id="btn-<?php echo $i; ?>"></button>
                <button class="edit-button" id="edit-<?php echo $i; ?>"></button>
                <button class="delete-button" id="del-<?php echo $i; ?>"></button>
            </div>
        <?php endfor; ?>
    </div>

    <script src="script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            <?php foreach ($buttonConfigs as $index => $config): ?>
                const button = document.getElementById('btn-<?php echo $index; ?>');
                button.style.backgroundColor = '<?php echo $config['color']; ?>';
                button.textContent = '<?php echo $config['title']; ?>';
                button.dataset.url = '<?php echo $config['url']; ?>';
                
                const editButton = document.getElementById('edit-<?php echo $index; ?>');
                const deleteButton = document.getElementById('del-<?php echo $index; ?>';
                
                editButton.style.display = 'block';
                deleteButton.style.display = 'block';
            <?php endforeach; ?>
        });
    </script>
</body>
</html>
