<!-- JAVASCRIPT -->
<script src=<?= base_url("assets/vendor/global/global.min.js")?>></script>
<script src=<?= base_url("assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js")?>></script>
<!-- <script src=<?= base_url("assets/vendor/chart-js/chart.bundle.min.js")?>></script> -->
<!-- <script src=<?= base_url("assets/vendor/apexchart/apexchart.js")?>></script> -->
<script src=<?= base_url("assets/vendor/nouislider/nouislider.min.js")?>></script>
<script src=<?= base_url("assets/vendor/wnumb/wNumb.js")?>></script>
<script src=<?= base_url("assets/js/dashboard/dashboard-1.js")?>></script>
<script src=<?= base_url("assets/js/custom.min.js")?>></script>
<script src=<?= base_url("assets/js/dlabnav-init.js")?>></script>
<script src=<?= base_url("assets/js/demo.js")?>></script>
<script src=<?= base_url("assets/js/styleSwitcher.js")?>></script>
<script src=<?= base_url("assets/vendor/datatables/js/jquery.dataTables.min.js")?> type="text/javascript"></script>
<script src=<?= base_url("assets/js/plugins-init/datatables.init.js")?> type="text/javascript"></script>

<!-- Toastify -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    
<!-- Jquery Confirm -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.js" integrity="sha512-zP5W8791v1A6FToy+viyoyUUyjCzx+4K8XZCKzW28AnCoepPNIXecxh9mvGuy3Rt78OzEsU+VCvcObwAMvBAww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

    // $('#generalTable').DataTable();

    function modalDelete(title, name, url, link) {
        $.confirm({
            title: `Delete ${title}?`,
            content: `Are you sure want to delete ${name}`,
            autoClose: 'cancel|8000',
            buttons: {
                delete: {
                    text: 'delete',
                    action: function () {
                        $.ajax({
                            type: 'POST',
                            url: url,
                            dataType: 'json',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                "_method": 'delete',
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function (data) {
                                window.location.href = link
                            },
                            error: function (data) {
                                $.alert('Failed!');
                                console.log(data);
                            }
                        });
                    }
                },
                cancel: function () {
                    
                }
            }
        });        
    }

    function logout() {
    $.confirm({
        icon: 'fas fa-sign-out-alt',
        title: 'Logout',
        theme: 'supervan',
        content: 'Are you sure want to logout?',
        autoClose: 'cancel|8000',
        buttons: {
            logout: {
                text: 'logout',
                action: function () {
                    $.ajax({
                        type: 'GET',
                        url: '<?= base_url('logout');?>',
                        success: function (data) {
                            location.reload();
                        },
                        error: function (data) {
                            $.alert('Failed!');
                            console.log(data);
                        }
                    });
                }
            },
            cancel: function () {
                
            }
        }
    });
}
</script>

<?php if(session()->has('success')) { ?>
    <script>
        Toastify({
            text: "<?php echo session()->get('success'); ?>",
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `right`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "#D5F3E9",
                color: "#1f7556"
            },
            duration: 3000
        }).showToast();
    </script>
<?php } ?>


<?php if(session()->has('warning')) { ?>
<script>
        Toastify({
            text: "{{ session()->get('warning') }}",
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `right`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "#FBEFDB",
                color: "#916c2e"
            },
            duration: 1000
        }).showToast();
</script>
<?php } ?>

<?php if(session()->has('failed')) { ?>
<script>
    Toastify({
        text: "🚨 <?php echo session()->get('failed'); ?>",
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `right`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        theme: "dark",
        style: {
            background: "#fde1e1",
            color: "#924040"
        },
        duration: 5000
    }).showToast();
</script>
<?php } ?>

<?= $this->renderSection('js'); ?>