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
                <form action="<?= route_to('stock-out-material.store') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="material_id">Material Technical</label>
                                <select class="form-select" name="material_id" id="material_id">
                                    <option disabled selected>Select User Technical</option>
                                    <?php foreach ($materials as $material): ?>
                                        <option value="<?= $material['id'] ?>"><?= $material['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <label for="material_out">Material Out</label>
                                <input id="material_out" name="material_out" type="number" min="0" class="form-control" placeholder="material_out" value="<?= old('material_out') ?>">
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
                        <a href="<?=route_to('stock-out-material.index')?>" class="btn btn-secondary waves-effect waves-light">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>