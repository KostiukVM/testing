<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Add Book</h1>
    <form method="POST">
        <div class="form-group">
            <label for="name">Book Name:</label>
            <input type="text" class="form-control" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" id="author" required>
        </div>

        <div class="form-group">
            <label for="genreId">Genre:</label>
            <select class="form-control" name="genreId" id="genreId" required>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?php echo $genre['id']; ?>">
                        <?php echo htmlspecialchars($genre['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" class="form-control" name="year" id="year" required>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
