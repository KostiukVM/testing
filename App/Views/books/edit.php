<h1>Edit Book</h1>
<form method="POST" action="/books/edit/<?= $book['id'] ?>">
    <label for="name">Book Name:</label>
    <input type="text" name="name" id="name" value="<?= $book['book_name'] ?>" required>

    <label for="author_id">Author:</label>
    <select name="author_id" id="author_id" required>
        <?php foreach ($authors as $author): ?>
            <option value="<?= $author['id'] ?>" <?= $author['id'] == $book['author_id'] ? 'selected' : '' ?>>
                <?= $author['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="genre_id">Genre:</label>
    <select name="genre_id" id="genre_id" required>
        <?php foreach ($genres as $genre): ?>
            <option value="<?= $genre['id'] ?>" <?= $genre['id'] == $book['genre_id'] ? 'selected' : '' ?>>
                <?= $genre['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Update</button>
</form>
