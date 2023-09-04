<?php include_once '../../../system/view/header.php';?>

<?php
isLogin();

// get data from database
$forms = find('forms', 'id='.getUri(6));
$terms = all('terms');
$contents = json_decode($forms['content']);
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
                            <li class="breadcrumb-item active" aria-current="page"><?=toTitle($forms['name'])?></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit <?=getUri(4)?></h4>
                            <p class="card-description"> Data Form </p>
                            <form class="forms-sample" method="post" action="<?=routes('form/update')?>">
                                <input type="hidden" name="form_id" value="<?=$forms['id']?>">
                                <div class="form-group">
                                    <label for="exampleInputName1">Nama Form</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Nama form" value="<?=$forms['name']?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Token untuk verifikasi form</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputName1"
                                        placeholder="Nama form" value="<?=$forms['token']?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Term yang akan dimasukkan</label>
                                    <div class="form-group">
                                        <?php
                                            // foreach the $terms
                                            foreach ($terms as $term) {
                                                $checked = inArray($term['id'],$contents)?"checked":"";
                                                echo '<div class="form-check">';
                                                echo '<label class="form-check-label">';
                                                echo '<input '.$checked.' type="checkbox" name="content[]" value="'.$term['id'].'" class="form-check-input"> '.$term['head'];
                                                echo '<i class="input-helper"></i>';
                                                echo '</label>';
                                                echo '</div>';
                                            }
                                        
                                        ?>
                                    </div>
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