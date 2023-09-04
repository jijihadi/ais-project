<?php include_once '../../../system/view/header.php';?>

<?php
isLogin();

// get data from database
$forms = all('forms');
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
                            <li class="breadcrumb-item active" aria-current="page"><?=toTitle(getUri(4))?></li>
                        </ol>
                    </nav>
                    <h3 class="page-title">
                        <button class="btn btn-primary btn-xs">
                            <a href="<?=routes('form/add')?>" class="btn btn-primary btn-sm">
                                <i class="mdi mdi-plus"></i>
                                Tambah Data
                            </a>
                        </button>
                    </h3>
                </div>
                <?php
                    if (isset($_SESSION['alert'])) {
                        $error = '<div id="login-error"';
                        $error .= '<div class="alert alert-'.$_SESSION['alert']['type'].' alert-dismissible fade show" role="alert">';
                        $error .= $_SESSION['alert']['message'];
                        $error .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        $error .= '</div>';
                        echo $error;
                        unset($_SESSION['alert']);
                    }
                ?>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4>Data <?=toTitle(getUri(4))?></h4>
                            <p class="card-description"> Update per tanggal
                                <code><?=toIndoDate(date('Y-m-d'))?></code>
                            </p>
                            <div class="table-container">

                                <table id="myTable" class="table table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Form</th>
                                            <th>Term terkait</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($forms as $form) {
                                            $content = json_decode($form['content']);
                                            $list = '<ul>';
                                            foreach($content as $key => $value){
                                                $term = one('terms',$value);
                                                $list .= '<li>'.$term['head'].'</li>';
                                            }
                                            $list .= '</ul>';
                                            echo "<tr>";
                                            echo "<td>$no</td>";
                                            echo "<td>$form[name]</td>";
                                            echo "<td>$list</td>";
                                            echo "<td>";
                                            echo "<a href='".routes('form/edit',$form['id'])."' class='btn btn-warning btn-sm mx-3'>Edit</a>";
                                            echo "<a onclick='deleteConfirmation(event)' href='".routes('form/delete',$form['id'])."' class='btn btn-danger btn-sm'>Hapus</a>";
                                            echo "<button onclick='copyLink(event)' name='$form[name]' url='".routes('form/fill',$form['token'])."' class='btn btn-info btn-sm mx-3'>Generate</button>";
                                            echo "</td>";
                                            echo "</tr>";
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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