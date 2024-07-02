document.addEventListener('DOMContentLoaded', function() {
    const bookForm = document.getElementById('bookForm');
    const titleInput = document.getElementById('title');
    const authorInput = document.getElementById('author');
    const yearInput = document.getElementById('year');
    const isCompleteInput = document.getElementById('isComplete');
    const incompleteList = document.getElementById('incompleteList');
    const completeList = document.getElementById('completeList');

    // buku tersimpan dari localStorage
    let books = JSON.parse(localStorage.getItem('books')) || [];

    function saveBooks() {
        localStorage.setItem('books', JSON.stringify(books));
    }

    function renderBooks() {
        incompleteList.innerHTML = '';
        completeList.innerHTML = '';

        books.forEach(book => {
            const li = document.createElement('li');
            li.textContent = `${book.title} - ${book.author} (${book.year})`;

            const moveButton = document.createElement('button');
            moveButton.textContent = 'Pindahkan Buku';
            moveButton.addEventListener('click', function() {
                book.isComplete = !book.isComplete;
                saveBooks();
                renderBooks();
            });

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Hapus';
            deleteButton.addEventListener('click', function() {
                books = books.filter(b => b.id !== book.id);
                saveBooks();
                renderBooks();
            });

            li.appendChild(moveButton);
            li.appendChild(deleteButton);

            if (book.isComplete) {
                completeList.appendChild(li);
            } else {
                incompleteList.appendChild(li);
            }
        });
    }

    bookForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const id = Date.now().toString(); 
        const title = titleInput.value.trim();
        const author = authorInput.value.trim();
        const year = parseInt(yearInput.value);
        const isComplete = isCompleteInput.checked;

        const newBook = { id, title, author, year, isComplete };
        books.push(newBook);
        saveBooks();
        renderBooks();

        titleInput.value = '';
        authorInput.value = '';
        yearInput.value = '';
        isCompleteInput.checked = false;
    });

    renderBooks();
});
