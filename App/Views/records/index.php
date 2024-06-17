<?php
global $router;
$page = $_GET['page'] ?? '/';
$counter = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1>Records</h1>
    <a href="/records/add" class="btn btn-primary mb-3">Add Record</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Visitor Name</th>
            <th>Book Name</th>
            <th>Date of Issue</th>
            <th>Return date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>
                <td><?= $record['id'] ?></td>
                <td><?= $record['visitor_name'] ?></td>
                <td><?= $record['book_name'] ?></td>
                <td><?= $record['date_of_issue'] ?></td>
                <td><?= $record['return_date'] ?></td>
                <td>
                    <?php if (in_array($record['bookId'], $booksOutOfStock)): ?>
                        <a href="<?= $router->getUrl('/records/return/' . $record['id']); ?>" class="btn btn-sm btn-success"
                           onclick="return confirm('Are you sure you want to return this book?')">Return</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container" id="content">
    <?php $router->dispatch($page); ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
