<!doctype html>
<html lang="en">

    
    <?= $this->include('layouts/partials/head') ?>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?= $this->include('layouts/partials/navbar')?>

            <!-- ========== Left Sidebar Start ========== -->
            <?= $this->include('layouts/partials/sidebar') ?>
            
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <?= $this->include('layouts/partials/breadcumb')?>

                        <?= $this->renderSection('content');?>

                    </div> <!-- container-fluid -->
                </div>

                <?= $this->include('layouts/partials/footer')?>
                
            </div>
            <!-- end main content-->

        </div>

        <?= $this->include('layouts/partials/foot') ?>

    </body>

</html>
