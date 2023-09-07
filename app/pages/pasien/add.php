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
                            <p class="card-description"> Data Pasien </p>
                            <form class="forms-sample" method="post" action="<?=routes('pasien/input')?>">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nomor Rekam Medis</label>
                                    <input type="text" name="medical_record" class="form-control" id="exampleInputName1"
                                        placeholder="Nomor rekam medis">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nama Pasien</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nama Pasien">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Jenis Kelamin</label>
                                    <select class="form-control my-select2" name="sex">
                                        <option value="-" selected>Pilih jenis kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 row">
                                    <div class="col-6">
                                        <label for="exampleInputPassword4">Tempat Lahir</label>
                                        <input type="text" name="birthplace" class="form-control"
                                            placeholder="Tempat Lahir">
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputPassword4">Tanggal Lahir</label>
                                        <input type="text" id="datepicker" name="birthdate" class="form-control"
                                            placeholder="Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nomor Telfon</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nomor Telfon">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Alamat</label>
                                    <textarea name="address" id="editor"></textarea>
                                </div>
                                <p class="card-description"> Data Wali </p>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Hubungan</label>
                                    <select class="form-control my-select2" name="relation">
                                        <option value="-" selected>Pilih hubungan kekeluargaan</option>
                                        <option value="Ayah">Ayah</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="Suami">Suami</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Adik">Adik</option>
                                        <option value="Kakak">Kakak</option>
                                        <option value="Kakek">Kakek</option>
                                        <option value="Nenek">Nenek</option>
                                        <option value="Paman">Paman</option>
                                        <option value="Bibi">Bibi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nama Wali</label>
                                    <input type="text" name="guardian_name" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nama Wali">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nomor Telfon Wali</label>
                                    <input type="text" name="guardian_phone" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nomor Telfon">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Alamat</label>
                                    <textarea name="guardian_address" id="editor2"></textarea>
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