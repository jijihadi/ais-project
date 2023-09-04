<?php include_once '../../../../system/view/header.php';?>

<?php
// get all term data
$terms = all('terms');
?>
<!-- Main body start -->
<style>
.main-panel {
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
                    <div class="card">
                        <div class="card-body">
                            <img src="<?= $baseurl.'/assets/raw/theme/images/logo.svg'?>" id="icons">
                            <h4 class="card-title">General Consent Elektronik</h4>
                            <p class="card-description"> Pasien Rumah Sakit Pusat Angkatan Darat Gatot Soebroto </p>
                            <!-- Timeline start-->
                            <div class="timeline">
                                <div class="event down event-active">
                                    <div class="detail">Proses <br> Pengisian data</div>
                                </div>
                                <div class="event down event-active">
                                    <div class="detail">Ketentuan <br>Rumah Sakit </div>
                                </div>
                                <div class="event down event-active">
                                    <div class="detail">Hak <br>Pasien </div>
                                </div>
                                <div class="event down event-active">
                                    <div class="detail">Persetujuan</div>
                                </div>
                            </div>
                            <!-- Timeline end -->
                            <form class="forms-sample" method="post" action="<?=routes('form/do-fill-4', getUri(7))?>">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="agree" value="Dengan menandatangani dokumen ini berarti saya telah memahami dan menyetujui semua ketentuan tersebut. 
                                            Jika yang memberikan tanda tangan bukan pasien yang bersangkutan, maka penandatangan menjamin bahwa ia mendapat kuasa dari pasien dan sah mewakili pasien." class="form-check-input">
                                            Dengan menandatangani dokumen ini berarti saya telah memahami dan menyetujui semua ketentuan tersebut. 
                                            Jika yang memberikan tanda tangan bukan pasien yang bersangkutan, maka penandatangan menjamin bahwa ia mendapat kuasa dari pasien dan sah mewakili pasien.
                                            <i class="input-helper"></i></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div id="canvas"></div>
                                </div>

                                <button action="<?=routes('form/fill/3')?>" class="btn btn-light">Back</button>
                                <button type="submit" class="btn btn-gradient-primary me-2">Next</button>
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
<?php include_once '../../../../system/view/footer.php';?>