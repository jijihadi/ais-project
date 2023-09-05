<?php include_once '../../../system/view/header.php';?>

<?php
isLogin();

// get data from database
$employees = find('employees', 'id='.getUri(6));
$user = find('users', 'id='.$employees['user_id'])
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
                            <li class="breadcrumb-item active" aria-current="page"><?=toTitle($employees['name'])?></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit <?=getUri(4)?></h4>
                            <p class="card-description"> Data Pegawai </p>
                            <form class="forms-sample" method="post" action="<?=routes('pegawai/update')?>">
                                <input type="hidden" name="employee_id" value="<?=$employees['id']?>">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nomor Pegawai</label>
                                    <input type="text" name="employee_number" class="form-control"
                                        id="exampleInputName1" placeholder="Nomor pegawai"
                                        value="<?=$employees['employee_number']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Pangkat Depan</label>
                                    <input type="text" name="front_title" class="form-control" id="exampleInputEmail3"
                                        placeholder="Pangkat yang terletak di depan nama pegawai"
                                        value="<?=$employees['front_title']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nama Pegawai</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nama Pegawai" value="<?=$employees['name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Pangkat Belakang</label>
                                    <input type="text" name="back_title" class="form-control" id="exampleInputEmail3"
                                        placeholder="Pangkat yang terletak di belakang nama pegawai"
                                        value="<?=$employees['back_title']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Tanggal Bergabung</label>
                                    <input type="text" id="datepicker" name="join_date" class="form-control"
                                        placeholder="Tanggal bergabung dengan rumah sakit" value="<?=$employees['join_date']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Posisi Kerja</label>
                                    <input type="text" name="position" class="form-control" id="exampleInputEmail3"
                                        placeholder="Posisi kerja saat ini" value="<?=$employees['position']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nomor Telfon Pegawai</label>
                                    <input type="text" name="phone" class="form-control" id="exampleInputEmail3"
                                        placeholder="Nomor Telfon" value="<?=$employees['phone']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Email Pegawai</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail3"
                                        placeholder="Email yang aktif" value="<?=$employees['email']?>">
                                </div>
                                <p class="card-description"> Data Login Pegawai </p>
                                <input type="hidden" name="user_id" value="<?=$user['id']?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Username Pegawai</label>
                                    <input type="text" name="username_lama" class="form-control" id="exampleInputEmail3" readonly
                                        placeholder="username sama dengan employee number" value="<?=$user['username']?>">
                                </div>
                                <input type="hidden" name="password_lama" value="<?=$user['password']?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Password Pegawai</label>
                                    <input type="password" name="password_baru" class="form-control"
                                        id="exampleInputEmail3"
                                        placeholder="password default adalah employee number namun bisa di set manual">
                                    <span class='fst-italic text-gray text-sm'>*kosongi jika tidak ingin merubah password</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Konfirmasi Password Pegawai</label>
                                    <input type="password" name="confirm_password_baru" class="form-control"
                                        id="exampleInputEmail3" placeholder="Konfirmasi password">
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