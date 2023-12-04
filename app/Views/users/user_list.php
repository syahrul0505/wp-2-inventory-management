<?= $this->extend('layouts/app'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-dark" style="border-radius:15px 15px 0px 0px;">
            <h4 class="card-title"><?= $page_title ?></h4>
                <div class=" d-flex justify-content-end mb-2">
                    <a href="<?=route_to('user_create')?>" class="btn btn-md btn-info">
                        <i class="fa fa-plus"></i> 
                        Create record
                    </a>
                </div> 
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('message')): ?>
                    <div class="alert alert-info">
                        <?= session()->getFlashdata('message') ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table id="example3" class="display" style="min-width: 845px">
                        <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i= 1;?>
                            <?php foreach ($users as $data): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $data->email ?></td>
                                    <td><?= $data->username ?></td>
                                    <td><?= $data->role_name ?></td>
                                    <td>
                                        <div class="btn-group-sm">
                                            <!-- <a href="<?= route_to('user_edit', $data->id) ?>"
                                                class="btn btn-warning text-white">
                                                <i class="far fa-edit"></i>
                                                Edit
                                            </a> -->
                                            <?php if (user()->id != $data->id): ?>
                                                <?php if ($data->role_name == 'User Technical'): ?>
                                                <a href="#" onclick="modalDelete('User', '<?= $data->username ?>', 'user/<?= $data->id ?>', '<?= route_to('user_list') ?>')" class="btn btn-danger f-12">
                                                    <i class="far fa-trash-alt"></i>
                                                    Delete
                                                </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<?= $this->endSection(); ?>



