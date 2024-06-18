<?php
global $router;
$page = $_GET['page'] ?? '/';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Genres</h1>
    <a href="<?php echo $router->getUrl('/genres/add') ?>" class="btn btn-primary mb-3">Add Genre</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($genres as $genre): ?>
            <tr>
                <td><?= $genre['id'] ?></td>
                <td><?= $genre['name'] ?></td>
                <td>
                    <a href="/genres/edit/<?= $genre['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container" id="content">
    <?php $router->dispatch($page); ?>
</div>

</body>
</html>
