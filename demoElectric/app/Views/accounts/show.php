<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="mb-4">
            <a href="<?= base_url('accounts') ?>" class="btn btn-outline-primary">Back to Accounts</a>
        </div>

        <div class="card p-4">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
                <div>
                    <h1 class="h3 text-primary-custom mb-1"><?= esc($account['customer_name']) ?></h1>
                    <p class="text-muted mb-0"><?= esc($account['account_number']) ?></p>
                </div>
                <span class="badge fs-6 bg-<?= $account['status'] === 'active' ? 'success' : ($account['status'] === 'inactive' ? 'danger' : 'warning text-dark') ?>">
                    <?= ucfirst(esc($account['status'])) ?>
                </span>
            </div>

            <div class="row g-4">
                <div class="col-md-6">
                    <h5>Contact Information</h5>
                    <p class="mb-1"><strong>Email:</strong> <?= esc($account['email']) ?></p>
                    <p class="mb-1"><strong>Phone:</strong> <?= esc($account['phone']) ?></p>
                    <p class="mb-0"><strong>Address:</strong> <?= esc($account['address']) ?></p>
                </div>
                <div class="col-md-6">
                    <h5>Service Information</h5>
                    <p class="mb-1"><strong>Meter Number:</strong> <?= esc($account['meter_number']) ?></p>
                    <p class="mb-1"><strong>Connection Type:</strong> <?= ucfirst(esc($account['connection_type'])) ?></p>
                    <p class="mb-1"><strong>Created:</strong> <?= esc(date('F j, Y', strtotime($account['created_at']))) ?></p>
                    <p class="mb-0"><strong>Updated:</strong> <?= esc(date('F j, Y', strtotime($account['updated_at']))) ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
