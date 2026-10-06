<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-5">
            <div>
                <p class="text-uppercase text-secondary-custom fw-semibold mb-1">Puihaha Electric Company</p>
                <h1 class="display-5 fw-bold text-primary-custom mb-1">Customer Accounts Dashboard</h1>
                <p class="lead text-muted mb-0">Manage customer service accounts, meters, connection types, and status.</p>
            </div>
            <a href="<?= base_url('accounts/create') ?>" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add Account
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <?php if (! empty($database_error)): ?>
            <div class="alert alert-warning">
                <?= esc($database_error) ?>
            </div>
        <?php endif; ?>

        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card h-100 p-3">
                    <h3 class="mb-0 text-primary-custom"><?= esc($total_accounts) ?></h3>
                    <p class="text-muted mb-0">Total Accounts</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-3">
                    <h3 class="mb-0 text-success"><?= esc($active_accounts) ?></h3>
                    <p class="text-muted mb-0">Active</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-3">
                    <h3 class="mb-0 text-danger"><?= esc($inactive_accounts) ?></h3>
                    <p class="text-muted mb-0">Inactive</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card h-100 p-3">
                    <h3 class="mb-0 text-warning"><?= esc($suspended_accounts) ?></h3>
                    <p class="text-muted mb-0">Suspended</p>
                </div>
            </div>
        </div>

        <div class="card p-4 mb-4">
            <form method="get" action="<?= base_url('accounts') ?>">
                <div class="row g-3">
                    <div class="col-lg-4">
                        <input type="text" class="form-control" name="search" placeholder="Search name, account, email, phone" value="<?= esc($search_keyword ?? '') ?>">
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select" name="status">
                            <option value="">All Status</option>
                            <option value="active" <?= ($filter_status ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
                            <option value="inactive" <?= ($filter_status ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                            <option value="suspended" <?= ($filter_status ?? '') === 'suspended' ? 'selected' : '' ?>>Suspended</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <select class="form-select" name="type">
                            <option value="">All Types</option>
                            <option value="residential" <?= ($filter_type ?? '') === 'residential' ? 'selected' : '' ?>>Residential</option>
                            <option value="commercial" <?= ($filter_type ?? '') === 'commercial' ? 'selected' : '' ?>>Commercial</option>
                            <option value="industrial" <?= ($filter_type ?? '') === 'industrial' ? 'selected' : '' ?>>Industrial</option>
                        </select>
                    </div>
                    <div class="col-lg-2 d-grid">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </form>

            <?php if ($search_keyword || $filter_status || $filter_type): ?>
                <div class="mt-3">
                    <a href="<?= base_url('accounts') ?>" class="btn btn-sm btn-outline-secondary">Clear Filters</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Account Number</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($accounts)): ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No accounts found</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($accounts as $account): ?>
                                <tr>
                                    <td><strong><?= esc($account['account_number']) ?></strong></td>
                                    <td><?= esc($account['customer_name']) ?></td>
                                    <td><?= esc($account['email']) ?></td>
                                    <td><?= esc($account['phone']) ?></td>
                                    <td><span class="badge bg-info"><?= ucfirst(esc($account['connection_type'])) ?></span></td>
                                    <td><span class="badge bg-<?= $account['status'] === 'active' ? 'success' : ($account['status'] === 'inactive' ? 'danger' : 'warning text-dark') ?>"><?= ucfirst(esc($account['status'])) ?></span></td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <a href="<?= base_url('accounts/' . $account['id']) ?>" class="btn btn-sm btn-outline-primary">View</a>
                                            <a href="<?= base_url('accounts/' . $account['id'] . '/edit') ?>" class="btn btn-sm btn-outline-secondary">Edit</a>
                                            <form method="post" action="<?= base_url('accounts/' . $account['id'] . '/delete') ?>" onsubmit="return confirm('Delete this customer account? This action cannot be undone.');">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if ($pager): ?>
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-4">
                    <span class="text-muted">Page <?= esc($current_page) ?> of <?= esc($pager->getPageCount()) ?></span>
                    <?= $pager->only(['search', 'status', 'type'])->links() ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
