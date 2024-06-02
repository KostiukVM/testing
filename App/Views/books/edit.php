<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>
<h1>Edit Book</h1>
<form method="post" action="">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($book['name']); ?>" required>
    <br>
    <label for="author">Author:</label>
    <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($book['author']); ?>" required>
    <br>
    <label for="year">Year:</label>
    <input type="number" name="year" id="year" value="<?php echo htmlspecialchars($book['year']); ?>" required>
    <br>
    <label for="genereId">Genre ID:</label>
    <input type="number" name="genereId" id="genereId" value="<?php echo htmlspecialchars($book['genereId']); ?>" required>
    <br>
    <button type="submit">Update</button>
</form>
</body>
</html>
