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
                <form action="../<?= $stock_out['id'] ?>" method="post">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="material_id">Material</label>
                                <select class="form-select" name="material_id" id="material_id">
                                    <option disabled selected>Select Material</option>
                                    <?php foreach ($materials as $material): ?>
                                    <option value="<?= $material['id'] ?>" <?= ($material['id'] == $stock_out['material_id'] ? 'selected' : '') ?>><?= $material['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="material_out">Material Out</label>
                                <input id="material_out" name="material_out" type="text" class="form-control" placeholder="material_out" value="<?= $stock_out['material_out'] ?>">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="4"><?=$stock_out['description'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap gap-2 justify-content-end mt-2">
                        <a href="<?=route_to('stock-out-material.index')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>