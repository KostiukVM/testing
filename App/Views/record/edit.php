<h1>Edit Record</h1>
<form method="POST" action="/records/edit/<?= $record['id'] ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?= $record['name'] ?>" required>
    <button type="submit">Update</button>
</form>
