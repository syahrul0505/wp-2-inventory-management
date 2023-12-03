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
                <form action="<?= route_to('material.store') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="code">Code</label>
                                <input id="code" name="code" type="text" class="form-control" placeholder="code" value="<?= old('code') ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input id="nama" name="nama" type="text" class="form-control" placeholder="nama" value="<?= old('nama') ?>">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="unit">Unit</label>
                                <input id="unit" name="unit" type="text" class="form-control" placeholder="unit" value="<?= old('unit') ?>">
                            </div>
                        </div>

                        <div class="col-lg-12">
                           <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" placeholder="Description" class="form-control" id="description" rows="4"></textarea>
                            </div>  
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 justify-content-end mt-2">
                        <a href="<?=route_to('material.index')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>