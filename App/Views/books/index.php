<h1>Books</h1>
<a href="/books/add">Add Book</a>
<table>
    <tr>
        <th>ID</th>
        <th>Book Name</th>
        <th>Author Name</th>
        <th>Genre Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?= $book['id'] ?></td>
            <td><?= $book['book_name'] ?></td>
            <td><?= $book['author_name'] ?></td>
            <td><?= $book['genre_name'] ?></td>
            <td>
                <a href="/books/edit/<?= $book['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
