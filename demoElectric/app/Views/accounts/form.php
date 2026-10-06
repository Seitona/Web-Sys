<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<?php
    $value = static fn (string $field) => old($field, $account[$field] ?? '');
?>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <p class="text-uppercase text-secondary-custom fw-semibold mb-1">Puihaha Electric Company</p>
                <h1 class="display-6 fw-bold text-primary-custom mb-0"><?= esc($formTitle) ?></h1>
            </div>
            <a href="<?= base_url('accounts') ?>" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
            </a>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <?php if (! empty($errors)): ?>
            <div class="alert alert-danger">
                <strong>Please fix the following:</strong>
                <ul class="mb-0 mt-2">
                    <?php foreach ($errors as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card p-4">
            <form method="post" action="<?= esc($action) ?>">
                <?= csrf_field() ?>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="account_number" class="form-label">Account Number</label>
                        <input type="text" class="form-control" id="account_number" name="account_number" value="<?= esc($value('account_number')) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="meter_number" class="form-label">Meter Number</label>
                        <input type="text" class="form-control" id="meter_number" name="meter_number" value="<?= esc($value('meter_number')) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= esc($value('customer_name')) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= esc($value('email')) ?>" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= esc($value('phone')) ?>" required>
                    </div>
                    <div class="col-md-3">
                        <label for="connection_type" class="form-label">Connection Type</label>
                        <select class="form-select" id="connection_type" name="connection_type" required>
                            <?php foreach (['residential' => 'Residential', 'commercial' => 'Commercial', 'industrial' => 'Industrial'] as $key => $label): ?>
                                <option value="<?= esc($key) ?>" <?= $value('connection_type') === $key ? 'selected' : '' ?>><?= esc($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <?php foreach (['active' => 'Active', 'inactive' => 'Inactive', 'suspended' => 'Suspended'] as $key => $label): ?>
                                <option value="<?= esc($key) ?>" <?= $value('status') === $key ? 'selected' : '' ?>><?= esc($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Service Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required><?= esc($value('address')) ?></textarea>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-2 mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i><?= esc($buttonText) ?>
                    </button>
                    <a href="<?= base_url('accounts') ?>" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
