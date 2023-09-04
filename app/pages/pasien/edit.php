<?php include_once '../../../system/view/header.php';?>

<?php
isLogin();

// get data from database
$patients = find('patients', 'id='.getUri(6));
$guardians = find('guardians', "patient_id = $patients[id]");
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
                            <li class="breadcrumb-item active" aria-current="page"><?=toTitle($patients['name'])?></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit <?=getUri(4)?></h4>
                            <p class="card-description"> Data Pasien </p>
                            <form class="forms-sample" method="post"
                                action="<?=routes('pasien/update')?>">
                                <input type="hidden" name="patient_id" value="<?=$patients['id']?>">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nomor Rekam Medis</label>
                                    <input type="text" name="medical_record" class="form-control" id="exampleInputName1"
                                        placeholder="Nomor rekam medis" value="<?=$patients['medical_record']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nama Pasien</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nama Pasien" value="<?=$patients['name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Jenis Kelamin</label>
                                    <select class="form-control my-select2" name="sex">
                                        <option value="-" selected>Pilih jenis kelamin</option>
                                        <option <?=isSelected('L', $patients['sex'])?> value="L">Laki-laki</option>
                                        <option <?=isSelected('P', $patients['sex'])?> value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 row">
                                    <div class="col-6">
                                        <label for="exampleInputPassword4">Tempat Lahir</label>
                                        <input type="text" name="birthplace" class="form-control"
                                            placeholder="Tempat Lahir" value="<?=$patients['birthplace']?>">
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputPassword4">Tanggal Lahir</label>
                                        <input type="text" id="datepicker" name="birthdate" class="form-control"
                                            placeholder="Tanggal Lahir" value="<?=$patients['birthdate']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nomor Telfon</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nomor Telfon" value="<?=$patients['phone']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Alamat</label>
                                    <textarea name="address" id="editor"> <?=$patients['address']?></textarea>
                                </div>
                                <p class="card-description"> Data Wali </p>
                                <input type="hidden" name="guardian_id" value="<?=$guardians['id']?>">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Hubungan</label>
                                    <select class="form-control my-select2" name="relation">
                                        <option value="-" selected>Pilih hubungan kekeluargaan</option>
                                        <option <?=isSelected('ayah', $guardians['relation'])?> value="ayah">Ayah</option>
                                        <option <?=isSelected('ibu', $guardians['relation'])?> value="ibu">Ibu</option>
                                        <option <?=isSelected('wali', $guardians['relation'])?> value="wali">Wali lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nama Wali</label>
                                    <input type="text" name="guardian_name" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nama Wali" value="<?=$guardians['name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nomor Telfon Wali</label>
                                    <input type="text" name="guardian_phone" class="form-control"
                                        id="exampleInputEmail3" placeholder="Nomor Telfon" value="<?=$guardians['phone']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Alamat</label>
                                    <textarea name="guardian_address" id="editor2"><?=$guardians['address']?></textarea>
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