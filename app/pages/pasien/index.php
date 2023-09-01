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
                            <li class="breadcrumb-item active" aria-current="page"><?=toTitle(getUri(4))?></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data <?=toTitle(getUri(4))?></h4>
                            <p class="card-description"> Update per tanggal <code><?=toIndoDate(date('Y-m-d'))?></code>
                            </p>
                            <table id="myTable" class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Product</th>
                                        <th>Sale</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jacob</td>
                                        <td>Photoshop</td>
                                        <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                                        <td><label class="badge badge-danger">Pending</label></td>
                                    </tr>
                                    <tr>
                                        <td>Messsy</td>
                                        <td>Flash</td>
                                        <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                                        <td><label class="badge badge-warning">In progress</label></td>
                                    </tr>
                                    <tr>
                                        <td>John</td>
                                        <td>Premier</td>
                                        <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                                        <td><label class="badge badge-info">Fixed</label></td>
                                    </tr>
                                    <tr>
                                        <td>Peter</td>
                                        <td>After effects</td>
                                        <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                                        <td><label class="badge badge-success">Completed</label></td>
                                    </tr>
                                    <tr>
                                        <td>Dave</td>
                                        <td>53275535</td>
                                        <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                        <td><label class="badge badge-warning">In progress</label></td>
                                    </tr>
                                </tbody>
                            </table>
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