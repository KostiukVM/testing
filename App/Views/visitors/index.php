<?php
global $router;
$page = $_GET['page'] ?? '/';
$counter = 0;
//dd($router);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitors</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            margin-bottom: 20px;
        }

        .card-title {
            margin-top: 50px;
        }

        .visitors {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            justify-items: stretch;
        }

        .row {
            width: 130%;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="visitors">
        <h1 class="card-title">Visitors</h1>
        <a href="/visitors/add" class="d-block">Add Visitor</a>
    </div>

    <?php foreach ($visitors as $visitor):
        if ($counter % 5 === 0): ?>
            <div class="row">
        <?php endif; ?>
        <div class="col-md-2">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Name: <?= $visitor['name'] ?></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Lastname: <?= $visitor['lastname'] ?></li>
                        <li class="list-group-item">Email: <?= $visitor['email'] ?></li>
                        <li class="list-group-item">Phone: <?= $visitor['phone'] ?></li>
                    </ul>
                    <div class="card-body">
                        <a href="<?php echo $router->getUrl('/visitors/edit/{$id}' . $visitor['id']); ?>"
                           class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($counter % 5 === 4 || $counter === count($visitors) - 1): ?>
        </div>
    <?php
    endif;
        $counter++;
    endforeach;
    ?>

</div>

<div class="container" id="content">
    <?php $router->dispatch($page); ?>
</div>

</body>
</html>
