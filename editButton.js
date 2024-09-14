document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const buttonIndex = urlParams.get('button');

    if (buttonIndex) {
        const config = JSON.parse(localStorage.getItem(`button-${buttonIndex}`));
        if (config) {
            document.getElementById('title').value = config.title;
            document.getElementById('url').value = config.url;
            document.getElementById('color').value = config.color;
        }
        document.getElementById('button-index').value = buttonIndex;
    }
});

document.getElementById('edit-form').addEventListener('submit', (event) => {
    event.preventDefault();

    const buttonIndex = document.getElementById('button-index').value;
    const title = document.getElementById('title').value;
    const url = document.getElementById('url').value;
    const color = document.getElementById('color').value;

    const config = {
        title: title,
        url: url,
        color: color
    };

    localStorage.setItem(`button-${buttonIndex}`, JSON.stringify(config));

    // Redirect back to the main page
    window.location.href = 'index.html';
});
