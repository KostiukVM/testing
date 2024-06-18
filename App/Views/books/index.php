<?php
global $router;
$page = $_GET['page'] ?? '/';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            margin-top: 50px;
        }
        .books {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            justify-items: stretch;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="books">
        <h1 class="mt-4 mb-3">Books</h1>
        <a href="/books/add" class="btn btn-primary mb-3">Add Book</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Genre</th>
            <th>Year</th>
            <th>In Stock</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?= $book['id'] ?></td>
                <td><?= $book['name'] ?></td>
                <td><?= $book['author_name'] ?></td>
                <td><?= $book['genre_name'] ?></td>
                <td><?= $book['year'] ?></td>
                <td><?= $book['inStock'] == 1 ? 'Yes' : 'No' ?></td>

                <td>
                    <a href="<?php echo $router->getUrl('/books/edit/' . $book['id']); ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="<?php echo $router->getUrl('/books/delete/' . $book['id']); ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="container" id="content">
    <?php $router->dispatch($page); ?>
</div>

</body>
</html>
