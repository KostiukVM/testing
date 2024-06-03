<h1>Genres</h1>
<a href="/genres/add">Add Genre</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($genres as $genre): ?>
        <tr>
            <td><?= $genre['id'] ?></td>
            <td><?= $genre['name'] ?></td>
            <td>
                <a href="/genres/edit/<?= $genre['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
