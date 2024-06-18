<?php
global$router;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Visitor</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Edit Visitor: <?php echo $visitor->name ; ?></h2>

    <form method="POST">
        <div class="form-group">
            <label for="name">Name: <?php echo $visitor->name ; ?></label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $visitor->name ?>" required>
        </div>
        <div class="form-group">
            <label for="lastname">Lastname: <?php echo $visitor->lastname; ?></label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $visitor->lastname; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email: <?php echo $visitor->email; ?></label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $visitor->email; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone: <?php echo $visitor->phone; ?></label>
            <input type="number" class="form-control" id="phone" name="phone" value="<?php echo $visitor->phone; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Visitor</button>
    </form>
</div>

</body>
</html>
