<?= view('layout/header') ?>

<h1>User Accounts</h1>
<table>
    <thead>
        <tr><th>Username</th><th>Full Name</th><th>Role</th></tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['name']) ?></td>
                <td><?= esc($user['role']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('layout/footer') ?>
