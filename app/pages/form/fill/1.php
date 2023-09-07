<?php include_once '../../../../system/view/header.php';?>

<?php
// get all term data
$employees = all('employees');
// get user data from session
$user = getSessionData('user');
$formdata = getSessionData('form');
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
                                <div class="event down">
                                    <div class="detail">Ketentuan <br>Rumah Sakit </div>
                                </div>
                                <div class="event down">
                                    <div class="detail">Hak <br>Pasien </div>
                                </div>
                                <div class="event down">
                                    <div class="detail">Persetujuan</div>
                                </div>
                            </div>
                            <!-- Timeline end -->
                            <form class="forms-sample" method="post" action="<?=routes('form/do-fill-1', getUri(7))?>">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Nama Petugas Rekam Medis</label>
                                    <select class="form-control my-select2" name="employee_id">
                                        <?php
                                        foreach ($employees as $employee) {
                                            $employeeFullname = $employee['front_title']." ".$employee['name'].". ".$employee['back_title'];
                                            echo '<option'.isSelected($employee['user_id'], $user['id']).' value="'.$employee['id'].'">'.$employeeFullname.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <input type="hidden" name="patient_id">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nomor Rekam Medis</label> 
                                    <input type="text" name="medical_record" class="form-control" id="exampleInputName1"
                                        placeholder="Nomor rekam medis" onchange="fillPasienWali(this)" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nama Pasien</label>
                                    <input type="text" name="name" class="form-control" id="nama-pasien"
                                        placeholder="Nama Pasien">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Jenis Kelamin</label>
                                    <select class="form-control my-select2" name="sex" id="sex">
                                        <option value="-" selected>Pilih jenis kelamin</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 row">
                                    <div class="col-6">
                                        <label for="exampleInputPassword4">Tempat Lahir</label>
                                        <input type="text" name="birthplace" class="form-control" id="tempat-lahir"
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
                                    <input type="text" name="phone" class="form-control" id="phone-pasien"
                                        placeholder="Nomor Telfon">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Alamat</label>
                                    <textarea name="address" id="editor-pasien"></textarea>
                                </div>
                                <p class="card-description"> Data Wali </p>
                                <input type="hidden" name="guardian_id">
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Hubungan</label>
                                    <select class="form-control my-select2" name="relation" id="relation">
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
                                    <input type="text" name="guardian_name" class="form-control" id="nama-wali"
                                        placeholder="Nama Wali">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nomor Telfon Wali</label>
                                    <input type="text" name="guardian_phone" class="form-control" id="phone-wali"
                                        placeholder="Nomor Telfon">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Alamat Wali</label>
                                    <textarea name="guardian_address" id="editor-wali"></textarea>
                                </div>
                                <a href="<?=routes('form/fill')?>" onclick="this.preventDefault()" class="btn btn-light">Back</a>
                                <button  type="submit" class="btn btn-gradient-primary me-2">Next</button>
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