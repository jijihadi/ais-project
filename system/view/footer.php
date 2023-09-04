<footer>

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
    <!-- <script src="<?=$baseurl?>/assets/raw/theme/js/misc.js"></script> -->
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?=$baseurl?>/assets/raw/theme/js/dashboard.js"></script>
    <script src="<?=$baseurl?>/assets/raw/theme/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <!-- Main CDN JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Datatables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/date-1.5.1/fh-3.4.0/r-2.5.0/sp-2.2.0/datatables.min.js">
    </script>
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Date -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <!-- Sweetalert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Signature Pad -->
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
    <!-- Own custom js -->
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $('.my-select2').select2();
        $("#datepicker").flatpickr();
        ClassicEditor.create(document.querySelector('#editor'), {
            toolbar: []
        });
        ClassicEditor.create(document.querySelector('#editor2'), {
            toolbar: []
        });
        ClassicEditor.create(document.querySelector('#editor-bullet'), {
            toolbar: ['bulletedList', ]
        });
    });
    // start signature
    var signaturePad = new SignaturePad(document.getElementById('signature-pad-pasien'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });
    document.getElementById('clear-pasien').addEventListener('click', function(event) {
        signaturePad.clear();
    });

    var signaturePad2 = new SignaturePad(document.getElementById('signature-pad-wali'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });
    document.getElementById('clear-wali').addEventListener('click', function(event) {
        signaturePad2.clear();
    });

    var signaturePad3 = new SignaturePad(document.getElementById('signature-pad-petugas'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
    });
    document.getElementById('clear-petugas').addEventListener('click', function(event) {
        signaturePad3.clear();
    });

    document.getElementById('save-pasien').addEventListener('click', function(event) {
        if (signaturePad.isEmpty()) {
            swal("Butuh tanda tangan pasien.");
        } else {
            var dataURL = signaturePad.toDataURL();
            document.getElementById('signed-pasien').value = dataURL;
        }
    });

    document.getElementById('save-wali').addEventListener('click', function(event) {
        if (signaturePad.isEmpty()) {
            swal("Butuh tanda tangan wali.");
        } else {
            var dataURL = signaturePad.toDataURL();
            document.getElementById('signed-wali').value = dataURL;
        }
    });

    document.getElementById('save-petugas').addEventListener('click', function(event) {
        if (signaturePad.isEmpty()) {
            swal("Butuh tanda tangan petugas.");
        } else {
            var dataURL = signaturePad.toDataURL();
            document.getElementById('signed-petugas').value = dataURL;
        }
    });

    // end signature
    function deleteConfirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        // console.log(urlToRedirect); // verify if this is the right URL
        swal({
                title: "Are you sure?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                // redirect to the urlToRedirect
                if (willDelete) {
                    window.location = urlToRedirect;
                } else {
                    swal("Delete Cancelled!", {
                        icon: "info",
                        timer: 2000,
                    });
                }
            });
    }
    // make function generate form which gonna open swal and gave 2 choice
    // first choice gonna copy the link to clipboard
    // second choice gonna open new tab with the link
    function copyLink(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('url');
        var name = ev.currentTarget.getAttribute('name');
        //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty
        // console.log(urlToRedirect); // verify if this is the right URL
        swal({
                title: "Form ",
                text: 'Form ' + name +
                    ' berhasil dibuat,\nPilih "Copy Link" untuk menyalin link atau "Open Link" untuk membuka link',
                icon: "info",
                buttons: {
                    cancel: "Cancel",
                    open: {
                        text: "Open Link",
                        color: "green",
                    },
                    copy: {
                        text: "Copy Link",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "open":
                        window.open(urlToRedirect, '_blank');
                        break;

                    case "copy":
                        navigator.clipboard.writeText(urlToRedirect);
                        swal("Link Copied!", {
                            icon: "success",
                            timer: 2000,
                        });
                        break;
                    default:
                        swal.close();

                }
            });
    }
    </script>
</footer>
</body>

</html>