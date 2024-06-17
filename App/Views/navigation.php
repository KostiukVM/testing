<?php
global $router;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Library</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            position: fixed;
            width: 1000%;
            top: 0;
            z-index: 1000;
        }

        .nav-link {
            top: 1000px;
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $router->getUrl('/'); ?>">Library</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                           href="<?php echo $router->getUrl('/books'); ?>">Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $router->getUrl('/visitors'); ?>">Visitors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $router->getUrl('/records'); ?>">Records</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $router->getUrl('/genres'); ?>">Genres</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
</body>
</html>