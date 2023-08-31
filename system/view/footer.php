<footer>
    <?php
$rootpath = $_SERVER['DOCUMENT_ROOT']."/ais-project";

include_once $rootpath . '/assets/cdn/js.php';
// require_js("$rootpath/assets/raw", 255);
?>
    <!-- plugins:js -->
    <script src="<?=$baseurl?>/assets/raw/theme/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?=$baseurl?>/assets/raw/theme/vendors/chart.js/Chart.min.js"></script>
    <script src="<?=$baseurl?>/assets/raw/theme/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=$baseurl?>/assets/raw/theme/js/off-canvas.js"></script>
    <script src="<?=$baseurl?>/assets/raw/theme/js/hoverable-collapse.js"></script>
    <script src="<?=$baseurl?>/assets/raw/theme/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?=$baseurl?>/assets/raw/theme/js/dashboard.js"></script>
    <script src="<?=$baseurl?>/assets/raw/theme/js/todolist.js"></script>
    <!-- End custom js for this page -->
</footer>
</body>

</html>