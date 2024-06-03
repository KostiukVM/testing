<h1>Records</h1>
<a href="/records/add">Add Record</a>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($records as $record): ?>
        <tr>
            <td><?= $record['id'] ?></td>
            <td><?= $record['visitorId'] ?></td>
            <td><?= $record['bookId'] ?></td>
            <td><?= $record['date_of_issue'] ?></td>
            <td>
                <a href="/records/edit/<?= $record['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
