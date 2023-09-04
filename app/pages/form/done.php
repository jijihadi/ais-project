<?php include_once '../../../system/view/header.php';?>

<?php
// get all term data
$terms = all('terms');
?>
<!-- Main body start -->
<style>
.main-panel {
    width: 100%;
}

.page-header {
    width: 100%;
}

.card {
    margin: 0 auto;
    width: 80%;
}

#icons {
    width: 50%;
    margin: 0 auto;
    margin-bottom: 20px;
    display: block;
}
</style>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "$rootpath/app/layout/topbar.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title">FORM SUDAH DITERIMA OLEH SISTEM</h4>
                                <div class="media">
                                    <div class="media-body">
                                        <p class="card-text">
                                            Silahkan menunggu untuk informasi baru dari rumah sakit terkait proses
                                            selanjutnya.
                                            <br>
                                            Terima kasih sudah mengunjungi RSPAD Gatot Soebroto
                                        </p>
                                        <br>
                                        <a href="<?=routes('dashboard')?>" class="btn btn-primary">Kembali ke
                                            dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                    <!-- content-wrapper ends -->
                    <!-- partial:partials/_footer.html -->
                    <!-- partial -->
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid d-flex justify-content-between">
                    <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright ©
                        Aisah Fajri Filani</span>

                </div>
            </footer>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- Main body end -->
<?php include_once '../../../system/view/footer.php';?>