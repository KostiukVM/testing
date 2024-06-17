<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Edit Book: <?php echo ($book->name); ?></h2>
    <form method="POST" action="/books/edit/<?php echo ($book->id); ?>">
        <div class="form-group">
            <label for="name">Book Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo ($book->name); ?>" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" name="author" id="author" value="<?php echo ($book->author); ?>" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre:</label>
            <select class="form-control" name="genreId" id="genre" required>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?php echo ($genre['id']); ?>" <?php echo $genre['id'] == $book->genreId ? 'selected' : ''; ?>>
                        <?php echo ($genre['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" class="form-control" name="year" id="year" value="<?php echo ($book->year); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
