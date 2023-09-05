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
                                <div class="event down">
                                    <div class="detail">Persetujuan</div>
                                </div>
                            </div>
                            <!-- Timeline end -->
                            <form class="forms-sample" method="post" action="<?=routes('form/do-fill-3', getUri(7))?>">
                                <?php
                                foreach ($terms as $key => $value) {
                                    if ($value['head'] != 'hak-pasien' && $value['head'] != 'kewajiban-pasien') {
                                        unset($terms[$key]);
                                    }
                                }
                                foreach ($terms as $term):
                                    $content = $term['content'];
                                ?>
                                <div class="form-group">
                                    <div class="d-block <?=$term['head']=='kuasa-privasi'? 'highlighted': '' ?>">
                                        <?php 
                                        echo $term['content'];
                                        if (isset($term['verification'])) {
                                            // delete ul tag in $term verification
                                            $verification = $term['verification'];
                                            $verification = str_replace('<ul>','',$verification);
                                            $verification = str_replace('</ul>','',$verification);
                                            $verification = str_replace('<li>','',$verification);
                                            $verification = explode('</li>', $verification);
                                            array_pop($verification);
                                            // if array not empty, foreach $verification to create checkbox
                                            if (!empty($verification)) {
                                                echo "<div class='form-group'>";
                                                $i = 1;
                                                foreach ($verification as $key => $value) {
                                                    $value = toPlainText($value);
                                                    echo '<div class="form-check">';
                                                    echo '<label class="form-check-label">';
                                                    echo '<input type="checkbox" name="verification[]" value="'.$value.'" class="form-check-input"> '.$value;
                                                    echo '<i class="input-helper"></i>';
                                                    echo '</label>';
                                                    echo '</div>';
                                                    $i++;
                                                }
                                                echo "</div>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php 
                                endforeach;
                                ?>
                                <a href="<?=routes('form/fill/2')?>" onclick="this.preventDefault()" class="btn btn-light">Back</a>
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