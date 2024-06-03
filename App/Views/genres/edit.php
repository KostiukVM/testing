<h1>Edit Genre</h1>
<form method="POST" action="/genres/edit/<?= $genre['id'] ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?= $genre['name'] ?>" required>
    <button type="submit">Update</button>
</form>
