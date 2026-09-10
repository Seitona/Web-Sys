<?= view('layout/header') ?>

<h1>Customer Accounts</h1>
<table>
    <thead>
        <tr><th>Full Name</th><th>Email</th><th>Phone Number</th></tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= esc($customer['name']) ?></td>
                <td><?= esc($customer['email']) ?></td>
                <td><?= esc($customer['phone']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= view('layout/footer') ?>
