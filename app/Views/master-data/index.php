<?= $this->extend('layouts/app'); ?>
<?= $this->section('css'); ?>
    <style>
       .radius-r-20{
        border-radius: 20px 50% 50% 20px !important;
    }
    .card {
        cursor: pointer;
        transition: all 0.2s !important;
    }

    .card:hover {
        transform: scale(1.02) !important;
        box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 5px 8px rgba(0, 0, 0, .06);
    }
    .bg-gray-400{
        background: #191c24;
    }
   </style>
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-4 col-md-6" onclick="location.href='<?= route_to('user_list') ?>'">
        <div class="card w-100">
            <div class="p-4 d-flex align-items-stretch h-100">
                <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                        <img src="<?= base_url('assets/images/icon/users.png') ?>" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                        <div>
                            <a href="javascript:void(0)" class="text-dark fs-4 link lh-sm">Users</a>
                            <h6 class="card-subtitle mt-2 mb-0 fw-normal text-muted">
                                Create, Update, and Delete Menu Users
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 col-md-6" onclick="location.href='<?= route_to('role_list') ?>'">
        <div class="card w-100">
            <div class="p-4 d-flex align-items-stretch h-100">
                <div class="row">
                <div class="col-4 col-md-3 d-flex align-items-center">
                    <img src="<?= base_url('assets/images/icon/role.png') ?>" class="rounded img-fluid" />
                </div>
                <div class="col-8 col-md-9 d-flex align-items-center">
                    <div>
                    <a href="javascript:void(0)" class="text-dark fs-4 link lh-sm">Role</a>
                    <h6 class="card-subtitle mt-2 mb-0 fw-normal text-muted">
                        Create,Update, and Delete Menu Role
                    </h6>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-lg-4 col-md-6" onclick="location.href='<?= route_to('material.index') ?>'">
        <div class="card w-100">
            <div class="p-4 d-flex align-items-stretch h-100">
                <div class="row">
                <div class="col-4 col-md-3 d-flex align-items-center">
                    <img src="<?= base_url('assets/images/icon/supply.png') ?>" class="rounded img-fluid" />
                </div>
                <div class="col-8 col-md-9 d-flex align-items-center">
                    <div>
                    <a href="javascript:void(0)" class="text-dark fs-4 link lh-sm">Material</a>
                    <h6 class="card-subtitle mt-2 mb-0 fw-normal text-muted">
                        Create,Update, and Delete Menu Material
                    </h6>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 col-md-6" onclick="location.href='<?= route_to('supplier.index') ?>'">
        <div class="card w-100">
            <div class="p-4 d-flex align-items-stretch h-100">
                <div class="row">
                <div class="col-4 col-md-3 d-flex align-items-center">
                    <img src="<?= base_url('assets/images/icon/deliv.png') ?>" class="rounded img-fluid" />
                </div>
                <div class="col-8 col-md-9 d-flex align-items-center">
                    <div>
                    <a href="javascript:void(0)" class="text-dark fs-4 link lh-sm">Supplier</a>
                    <h6 class="card-subtitle mt-2 mb-0 fw-normal text-muted">
                        Create,Update, and Delete Menu Supplier
                    </h6>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>



