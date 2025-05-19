document.addEventListener('DOMContentLoaded', function() {
    fetch('search.php?query=')
        .then(response => response.text())
        .then(data => {
            document.getElementById('resep-list').innerHTML = data;
        });
});