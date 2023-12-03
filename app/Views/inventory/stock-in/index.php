<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= $page_title ?></h4>
            <div class="d-flex justify-content-end mb-2">
                <a href="<?=route_to('stock-in-material.create')?>" class="btn btn-md btn-info">
                    <i class="fa fa-plus"></i> 
                    Create
                </a>
            </div>  
        </div>
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-info">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example3" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Material</th>
                            <th>Stock In</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1;?>
                        <?php foreach ($stock_ins as $data): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['material_name'] ?></td>
                                <td><?= $data['material_in'] ?></td>
                                <td><?= $data['description'] ?></td>
                                <td>
                                    <div class="btn-group-sm">
                                        <a href="<?= route_to('stock-in-material.edit', $data['id']) ?>"
                                            class="btn btn-warning text-white">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="#" onclick="modalDelete('Material', '<?= $data['material_name'] ?>', 'stock-in-material/<?= $data['id'] ?>', '<?= route_to('stock-in-material.index') ?>')" class="btn btn-danger f-12">
                                            <i class="far fa-trash-alt"></i>
                                            Delete
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>



