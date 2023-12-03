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
                <form action="../<?= $supplier['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="supplier_name">Supplier Name</label>
                                <input id="supplier_name" name="supplier_name" type="text" class="form-control" placeholder="supplier_name" value="<?= $supplier['supplier_name'] ?>">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="telephone">Telephone</label>
                                <input id="telephone" name="telephone" type="text" class="form-control" placeholder="telephone" value="<?= $supplier['telephone'] ?>">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control" placeholder="email" value="<?= $supplier['email'] ?>">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" class="form-control" id="address" rows="4"><?=$supplier['address'] ?></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="4"><?=$supplier['description'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 justify-content-end mt-2">
                        <a href="<?=route_to('supplier.index')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>