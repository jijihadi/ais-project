<?php include_once '../../../system/view/header.php';?>
<?php
isLogin();

// get data from database
$patient = find('patients', 'id=' . getUri(6));
$guardian = find('guardians', 'patient_id=' . $patient['id']);
if (!empty($post)) {
    $consent = findLatest('consents', 'inputdate like "'.$post["consentdate"].'%" and patient_id=' . $patient['id']);
} else {
    $consent = findLatest('consents', 'patient_id=' . $patient['id']);
}
print_r($consent);
$employee = find('employees', 'id=' . $consent['employee_id']);
$form = find('forms', 'id=' . $consent['form_id']);

$consentDate = all('consents', 'patient_id=' . $patient['id']);
?>

<style>
.table th img,
.table td img {
    width: 160px;
    height: 80px;
}
</style>
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
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div>

                                    <form id="form-consent-date" method="post" action="<?=routes('form/preview-new', $patient['id'])?>">
                                        <div class="form-group">
                                            <?php
                                                if (!empty($consentDate)) {
                                                    echo "<form method='post' action='" . routes('form/preview-new', $patient['id']) . "'>";
                                                    echo "<div class='form-group py-3'>";
                                                    echo "<select class='form-control my-select2' name='consentdate' id='consentdates'>";
                                                    echo "<option value='-'>Pilih Tanggal Consent</option>";
                                                    foreach ($consentDate as $c) {
                                                        $selected = toDbDate($consent['inputdate']) == toDbDate($c['inputdate']) ? 'selected' : '';
                                                        echo "<option $selected value='" . toDbDate($c['inputdate']) . "'>" . toIndoDate($c['inputdate']) . "</option>";
                                                    }
                                                    echo "</select>";
                                                    echo "</div>";
                                                    echo "</form>";
                                                }
                                            ?>
                                        </div>
                                    </form>
                                </div>
                                <h4 class="card-title">Data Submisi General Consent</h4>
                                <p class="card-description"> milik pasien <?=$patient['name']?></p>
                                <table class="table table-responsive table-borderless">
                                    <tr>
                                        <td>Nomor Rekam Medis</td>
                                        <td>:</td>
                                        <td><?=$patient['medical_record']?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pasien</td>
                                        <td>:</td>
                                        <td><?=$patient['name']?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td><?=$patient['sex']?></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Tanggal Lahir</td>
                                        <td>:</td>
                                        <td><?="$patient[birthplace], " . toIndoDate($patient['birthdate'])?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?=$patient['address']?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>:</td>
                                        <td><?=$patient['phone']?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Wali/Penanggung Jawab</h4>
                                <p class="card-description"> pasien <?=$patient['name']?></p>
                                <table class="table table-responsive table-borderless">
                                    <tr>
                                        <td>Hubungan</td>
                                        <td>:</td>
                                        <td><?=toTitle($guardian['relation'])?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Wali</td>
                                        <td>:</td>
                                        <td><?=$guardian['name']?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?=$guardian['address']?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telepon</td>
                                        <td>:</td>
                                        <td><?=$guardian['phone']?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 my-3">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    $term = json_decode($form['content'], true);

                                    foreach ($term as $t) {
                                        $termData = find('terms', 'id=' . $t);

                                        if ($termData['head'] != 'hak-pasien' && $termData['head'] != 'kewajiban-pasien') {
                                            $contentTerm = $termData['content'];
                                            echo "<p>$contentTerm</p>";

                                            if ($termData['head'] == 'kuasa-privasi') {
                                                $verification = json_decode($consent['verification']);
                                                echo "<div class='form-group'>";
                                                foreach ($verification as $v) {
                                                    echo '<div class="form-check"  id="verif">';
                                                    echo '<label class="form-check-label">';
                                                    echo '<input type="checkbox" checked class="form-check-input"> ' . $v;
                                                    echo '<i class="input-helper"></i>';
                                                    echo '</label>';
                                                    echo '</div>';
                                                }
                                                echo "</div>";
                                            }
                                        }
                                    }
                                    echo "<b>$consent[agree]</b>";
                                ?>
                                <div class="my-3 text-center">
                                    <table class="table table-responsive table-borderless">
                                        <tr>
                                            <td>Tanda tangan pasien</td>
                                            <td>Tanda tangan wali</td>
                                            <td>Tanda tangan petugas</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <img src='<?="$baseurl/assets/images/signatures/$consent[patient_sign]"?>'
                                                    class="sign">
                                            </td>
                                            <td>
                                                <img src='<?="$baseurl/assets/images/signatures/$consent[guardian_sign]"?>'
                                                    class="sign">
                                            </td>
                                            <td>
                                                <img src='<?="$baseurl/assets/images/signatures/$consent[employee_sign]"?>'
                                                    class="sign">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><?=$patient['name']?></td>
                                            <td><?=$guardian['name']?></td>
                                            <td><?="$employee[front_title] $employee[name] $employee[back_title]"?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
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