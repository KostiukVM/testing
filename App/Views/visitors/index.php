<h1>Visitors</h1>
<a href="/visitors/add">Add Visitor</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($visitors as $visitor): ?>
        <tr>
            <td><?= $visitor['id'] ?></td>
            <td><?= $visitor['name'] ?></td>
            <td><?= $visitor['email'] ?></td>
            <td><?= $visitor['phone'] ?></td>
            <td>
                <a href="/visitors/edit/<?= $visitor['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
