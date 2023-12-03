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
                <form action="../<?= $material['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="code">Code</label>
                                <input id="code" name="code" type="text" class="form-control" placeholder="Code" value="<?= $material['code'] ?>">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="role">Nama</label>
                                <input id="nama" name="nama" type="text" class="form-control" placeholder="Nama" value="<?= $material['nama'] ?>">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="unit">Unit</label>
                                <input id="unit" name="unit" type="text" class="form-control" placeholder="unit" value="<?= $material['unit'] ?>">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="4"><?=$material['description'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 justify-content-end mt-2">
                        <a href="<?=route_to('material.index')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>