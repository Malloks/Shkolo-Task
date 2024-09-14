document.addEventListener('DOMContentLoaded', () => {
    loadButtonConfigurations();

    for (let i = 1; i <= 9; i++) {
        const button = document.getElementById(`btn-${i}`);
        const editButton = document.getElementById(`edit-${i}`);
        const delButton = document.getElementById(`del-${i}`);

        // Button click to go to URL or edit page
        button.addEventListener('click', () => handleButtonClick(i));

        // Edit button click - navigate to edit page
        editButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent triggering the button's click event
            window.location.href = `editButton.html?button=${i}`;
        });

        // Delete button click - reset the button configuration
        delButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent triggering the button's click event
            resetButton(button, editButton, delButton, i);
        });
    }
});

// Load button configurations from localStorage
function loadButtonConfigurations() {
    for (let i = 1; i <= 9; i++) {
        const config = JSON.parse(localStorage.getItem(`button-${i}`));
        const button = document.getElementById(`btn-${i}`);
        const editButton = document.getElementById(`edit-${i}`);
        const delButton = document.getElementById(`del-${i}`);

        if (config) {
            button.style.backgroundColor = config.color;
            button.textContent = config.title;
            button.dataset.url = config.url;
            button.style.backgroundImage = 'none'; // Ensure background image is removed
            editButton.style.display = 'block';    // Show the edit button
            delButton.style.display = 'block';     // Show the delete button
        } else {
            button.style.backgroundImage = 'url("Assets/addImage.png")'; // Set default image
            button.style.backgroundColor = 'transparent';               // Reset background color
            button.textContent = "";                                    // Reset button text
            editButton.style.display = 'none';                          // Hide edit button
            delButton.style.display = 'none';                           // Hide delete button
        }
    }
}

// Handle main button click - navigate to URL or edit page if no URL is set
function handleButtonClick(index) {
    const button = document.getElementById(`btn-${index}`);
    const url = button.dataset.url;

    if (url) {
        window.location.href = url;
    } else {
        // Redirect to the edit button page with the button index as a query parameter
        window.location.href = `editButton.html?button=${index}`;
    }
}

// Reset a button to its original state
function resetButton(button, editButton, deleteButton, index) {
    button.style.backgroundImage = "url('Assets/addImage.png')";  // Restore default background image
    button.style.backgroundColor = "transparent";                 // Reset background color
    button.innerHTML = "";                                        // Clear button text
    delete button.dataset.url;                                    // Remove the URL data attribute
    editButton.style.display = "none";                            // Hide edit button
    deleteButton.style.display = "none";                          // Hide delete button

    // Remove the stored configuration from localStorage
    localStorage.removeItem(`button-${index}`);

    // Reset button's click event to go to the edit page
    button.addEventListener('click', () => {
        window.location.href = `editButton.html?button=${index}`;
    });
}
// Add event listeners to all delete buttons
document.querySelectorAll('.delete-button').forEach((deleteButton, index) => {
    const button = document.getElementById(`btn-${index + 1}`);
    const editButton = document.getElementById(`edit-${index + 1}`);

    deleteButton.addEventListener('click', function() {
        resetButton(button, editButton, deleteButton, index);
    });
});

// Update your existing function to show both edit and delete buttons
function updateButtonDisplay(index) {
    const editButton = document.getElementById(`edit-${index + 1}`);
    const deleteButton = document.getElementById(`del-${index + 1}`);
    editButton.style.display = 'block';
    deleteButton.style.display = 'block';
}

document.addEventListener('DOMContentLoaded', () => {
    loadButtonConfigurations();

    for (let i = 1; i <= 9; i++) {
        const button = document.getElementById(`btn-${i}`);
        const editButton = document.getElementById(`edit-${i}`);
        const delButton = document.getElementById(`del-${i}`);

        // Button click to go to URL or edit page
        button.addEventListener('click', () => handleButtonClick(i));

        // Edit button click - navigate to edit page
        editButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent triggering the button's click event
            window.location.href = `editButton.html?button=${i}`;
        });

        // Delete button click - reset the button configuration
        delButton.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent triggering the button's click event
            deleteButton(i, button, editButton, delButton);
        });
    }
});

// Load button configurations from server
function loadButtonConfigurations() {
    fetch('fetch_buttons.php')
        .then(response => response.json())
        .then(buttons => {
            buttons.forEach(button => {
                const btnElement = document.getElementById(`btn-${button.id}`);
                const editButton = document.getElementById(`edit-${button.id}`);
                const delButton = document.getElementById(`del-${button.id}`);

                if (btnElement) {
                    btnElement.style.backgroundColor = button.color;
                    btnElement.textContent = button.title;
                    btnElement.dataset.url = button.url;
                    btnElement.style.backgroundImage = 'none'; // Ensure background image is removed
                    editButton.style.display = 'block';    // Show the edit button
                    delButton.style.display = 'block';     // Show the delete button
                }
            });
        })
        .catch(error => console.error('Error fetching button configurations:', error));
}

// Handle main button click - navigate to URL or edit page if no URL is set
function handleButtonClick(index) {
    const button = document.getElementById(`btn-${index}`);
    const url = button.dataset.url;

    if (url) {
        window.location.href = url;
    } else {
        // Redirect to the edit button page with the button index as a query parameter
        window.location.href = `editButton.html?button=${index}`;
    }
}

// Delete a button configuration
function deleteButton(index, button, editButton, deleteButton) {
    fetch('delete_button.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({ 'button-index': index })
    })
    .then(response => response.text())
    .then(result => {
        alert(result);
        // Reset button UI
        button.style.backgroundImage = "url('Assets/addImage.png')";  // Restore default background image
        button.style.backgroundColor = "transparent";                 // Reset background color
        button.textContent = "";                                        // Clear button text
        deleteButton.style.display = "none";                            // Hide delete button
        editButton.style.display = "none";                              // Hide edit button
        button.removeAttribute('data-url');                             // Remove the URL data attribute
    })
    .catch(error => console.error('Error deleting button:', error));
}
