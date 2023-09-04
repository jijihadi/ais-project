<?php include_once '../../../system/view/header.php';?>

<?php
isLogin();
?>
<!-- Main body start -->
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "$rootpath/app/layout/topbar.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include "$rootpath/app/layout/sidebar.php";?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=routes('dashboard')?>"><?=toTitle('Dashboard')?></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page"><a
                                    href="<?=routes(getUri(4))?>"><?=toTitle(getUri(4))?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=toTitle(getUri(5))?></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah <?=getUri(4)?> baru</h4>
                            <p class="card-description"> Data Term </p>
                            <form class="forms-sample" method="post" action="<?=routes('term/input')?>">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Term</label>
                                    <input type="text" name="head" class="form-control" id="exampleInputName1"
                                        placeholder="Nama term">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Isi Term</label>
                                    <textarea name="content" id="editor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Verifikasi</label>
                                    <textarea name="verification" id="editor-bullet"><ul><li /><li /></ul></textarea>
                                    <span class="text-gray text-sm fw-lighter fst-italic">*verifikasi akan sejumlah dengan titik hitam</span>
                                </div>
                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                        Aisah Fajri Filani</span>

                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- Main body end -->
<?php include_once '../../../system/view/footer.php';?>