<?php include_once '../../../system/view/header.php';?>

<?php
if (isset($_SESSION['user'])) {
    header("location: $baseurl/app/pages/dashboard/index.php");
}

?>
<!-- Main body start -->
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light p-5">
                        <div class="text-center">
                            <div class="brand-logo">
                                <img src="<?="$baseurl/assets/raw/theme/images/logo.svg"?>">
                            </div>
                        </div>
                        <h4>Digital General Consent App</h4>
                        <h6 class="font-weight-light">Sign in to continue.</h6>
                        <?php
                        if (isset($_SESSION['error']['login'])) {
                            $error = '<div id="login-error"';
                            $error .= '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                            $error .= '<strong>OOPPS!!</strong><br>';
                            $error .= $_SESSION['error']['login'];
                            $error .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            $error .= '</div>';
                            echo $error;
                            unset($_SESSION['error']);
                        }
                        ?>
                        <form class="pt-3" action="do-login.php" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control form-control-lg"
                                    id="exampleInputEmail1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="mt-3">
                                <button type="submit" name="login"
                                    class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                    SIGN IN
                                </button>
                            </div>
                            <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                </div>
                                <a href="#" class="auth-link text-black">Forgot password?</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- Main body end -->
<?php include_once '../../../system/view/footer.php';?>