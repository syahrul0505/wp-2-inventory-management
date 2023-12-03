<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?= $page_title ?></h4>
            <div class="d-flex justify-content-end mb-2">
                <a href="<?=route_to('role_create')?>" class="btn btn-md btn-info">
                    <i class="fa fa-plus"></i> 
                    Create record
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
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i= 1;?>
                        <?php foreach ($roles as $data): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $data['name'] ?></td>
                                <td>
                                    <div class="btn-group-sm">
                                        <a href="<?= route_to('role_edit', $data['id']) ?>"
                                            class="btn btn-warning text-white">
                                            <i class="far fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="#" onclick="modalDelete('Role', '<?= $data['name'] ?>', 'role/<?= $data['id'] ?>', '<?= route_to('role_list') ?>')" class="btn btn-danger f-12">
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



