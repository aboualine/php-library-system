function searchBooks() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach(row => {
        const title = row.cells[0].textContent.toLowerCase();
        const author = row.cells[1].textContent.toLowerCase();
        const isbn = row.cells[2].textContent.toLowerCase();
        if (title.includes(input) || author.includes(input) || isbn.includes(input)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}