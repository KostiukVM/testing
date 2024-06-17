<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Book</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Issue Book</h1>
    <form method="POST">
        <div class="form-group">
            <label for="visitor">Visitor:</label>
            <select class="form-control" name="visitorId" id="visitor" required>
                <?php foreach ($visitors as $visitor): ?>
                    <option value="<?= $visitor['id'] ?>"><?= $visitor['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="book">Book:</label>
            <select class="form-control" name="bookId" id="book" required>
                <?php foreach ($books as $book): ?>
                    <option value="<?= $book['id'] ?>"><?= $book['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="date_of_issue">Date of Issue:</label>
            <input type="date" class="form-control" name="date_of_issue" id="date_of_issue" required>
        </div>

        <div class="form-group">
            <label for="return_date">Return Date:</label>
            <input type="date" class="form-control" name="return_date" id="return_date">
        </div>

        <button type="submit" class="btn btn-primary">Issue</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
