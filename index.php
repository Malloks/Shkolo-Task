<?php
// Include any PHP logic here if needed (e.g., database connections, session handling)
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
    <form action="insert_data.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <button type="submit">Submit</button>
    </form>
    
    <div class="grid-container">
        <!-- 9 Cells for buttons -->
        <div class="grid-item" id="cell-1">
            <button class="grid-button" id="btn-1"></button>
            <button class="edit-button" id="edit-1"></button>
            <button class="delete-button" id="del-1"></button>
        </div>
        <div class="grid-item" id="cell-2">
            <button class="grid-button" id="btn-2"></button>
            <button class="edit-button" id="edit-2"></button>
            <button class="delete-button" id="del-2"></button>
        </div>
        <div class="grid-item" id="cell-3">
            <button class="grid-button" id="btn-3"></button>
            <button class="edit-button" id="edit-3"></button>
            <button class="delete-button" id="del-3"></button>
        </div>
        <div class="grid-item" id="cell-4">
            <button class="grid-button" id="btn-4"></button>
            <button class="edit-button" id="edit-4"></button>
            <button class="delete-button" id="del-4"></button>
        </div>
        <div class="grid-item" id="cell-5">
            <button class="grid-button" id="btn-5"></button>
            <button class="edit-button" id="edit-5"></button>
            <button class="delete-button" id="del-5"></button>
        </div>
        <div class="grid-item" id="cell-6">
            <button class="grid-button" id="btn-6"></button>
            <button class="edit-button" id="edit-6"></button>
            <button class="delete-button" id="del-6"></button>
        </div>
        <div class="grid-item" id="cell-7">
            <button class="grid-button" id="btn-7"></button>
            <button class="edit-button" id="edit-7"></button>
            <button class="delete-button" id="del-7"></button>
        </div>
        <div class="grid-item" id="cell-8">
            <button class="grid-button" id="btn-8"></button>
            <button class="edit-button" id="edit-8"></button>
            <button class="delete-button" id="del-8"></button>
        </div>
        <div class="grid-item" id="cell-9">
            <button class="grid-button" id="btn-9"></button>
            <button class="edit-button" id="edit-9"></button>
            <button class="delete-button" id="del-9"></button>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
