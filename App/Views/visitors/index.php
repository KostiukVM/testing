<?php
global $router;
$page = $_GET['page'] ?? '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitors</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .visitors {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="visitors">
        <h1>Visitors</h1>
        <a href="/visitors/add" class="btn btn-primary">Add Visitor</a>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($visitors as $visitor): ?>
            <tr>
                <td><?= $visitor['id'] ?></td>
                <td><?= $visitor['name'] ?></td>
                <td><?= $visitor['lastname'] ?></td>
                <td><?= $visitor['email'] ?></td>
                <td><?= $visitor['phone'] ?></td>
                <td>
                    <a href="<?= $router->getUrl('/visitors/edit/' . $visitor['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
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
