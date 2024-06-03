<h1>Edit Visitor</h1>
<form method="POST" action="/visitors/edit/<?= $visitor['id'] ?>">
    <label for="lastname">Name:</label>
    <input type="text" name="name" id="name" value="<?= $visitor['name'] ?>" required>


    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?= $visitor['email'] ?>" required>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" id="phone" value="<?= $visitor['phone'] ?>" required>

    <button type="submit">Update</button>
</form>
