<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
</head>
<body>
<h1>List of Books</h1>
<a href="Views/books/add">Add New Book</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Author</th>
        <th>Year</th>
        <th>Genre</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><?php echo htmlspecialchars($book['id']); ?></td>
            <td><?php echo htmlspecialchars($book['name']); ?></td>
            <td><?php echo htmlspecialchars($book['author']); ?></td>
            <td><?php echo htmlspecialchars($book['year']); ?></td>
            <td><?php echo htmlspecialchars($book['genereId']); ?></td>
            <td>
                <a href="/books/edit/<?php echo $book['id']; ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
