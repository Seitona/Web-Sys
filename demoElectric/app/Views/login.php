<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<section class="section-padding bg-light-custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-4">
                    <div class="text-center mb-4">
                        <h1 class="h3 text-primary-custom">Puihaha Electric Company Login</h1>
                        <p class="text-muted mb-0">Login to open the customer accounts CRUD dashboard.</p>
                    </div>

                    <?php if (session()->getFlashdata('success')): ?>
                        <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
                    <?php endif; ?>

                    <?php if (! empty($error)): ?>
                        <div class="alert alert-danger"><?= esc($error) ?></div>
                    <?php endif; ?>

                    <form method="post" action="<?= base_url('login') ?>">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>

                    <p class="text-muted small mt-4 mb-0">
                        No account yet? <a href="<?= base_url('register') ?>">Register here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
