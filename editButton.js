document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const buttonIndex = urlParams.get('button');

    if (buttonIndex) {
        fetchButtonConfig(buttonIndex);
        document.getElementById('button-index').value = buttonIndex;
    }
});

function fetchButtonConfig(buttonIndex) {
    fetch(`fetch_buttons.php`)
        .then(response => response.json())
        .then(buttons => {
            const config = buttons.find(button => button.id == buttonIndex);
            if (config) {
                document.getElementById('title').value = config.title;
                document.getElementById('url').value = config.url;
                document.getElementById('color').value = config.color;
            }
        })
        .catch(error => console.error('Error fetching button configuration:', error));
}

document.getElementById('edit-form').addEventListener('submit', (event) => {
    event.preventDefault();

    const buttonIndex = document.getElementById('button-index').value;
    const title = document.getElementById('title').value;
    const url = document.getElementById('url').value;
    const color = document.getElementById('color').value;

    // Save to server
    const formData = new FormData();
    formData.append('title', title);
    formData.append('url', url);
    formData.append('color', color);
    formData.append('button-index', buttonIndex);

    fetch('editButton.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(result => {
        alert(result); // Show result or handle success/error
        // Redirect back to the main page
        window.location.href = 'index.html';
    })
    .catch(error => {
        console.error('Error:', error);
    });
});