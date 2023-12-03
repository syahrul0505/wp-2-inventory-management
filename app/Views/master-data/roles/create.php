<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= route_to('role_store') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="Role Name" value="<?= old('name') ?>">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 justify-content-end">
                        <a href="<?=route_to('role_list')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>