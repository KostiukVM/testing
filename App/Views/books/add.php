<h1>Add Book</h1>
<form method="POST" action="/books/add">
    <label for="name">Book Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="author_id">Author:</label>
    <select name="author_id" id="author_id" required>
        <?php foreach ($authors as $author): ?>
            <option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <label for="genre_id">Genre:</label>
    <select name="genre_id" id="genre_id" required>
        <?php foreach ($genres as $genre): ?>
            <option value="<?= $genre['id'] ?>"><?= $genre['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Add</button>
</form>
