<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSPAD</title>
    <?php
        $rootpath = $_SERVER['DOCUMENT_ROOT']."/ais-project";

        include "$rootpath/system/config/base.php";
        
    ?>
    <!-- Main CDN CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Datatables -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/date-1.5.1/fh-3.4.0/r-2.5.0/sp-2.2.0/datatables.min.css"
        rel="stylesheet">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Date -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Custom own css -->
    <!-- <link rel="<?= "$baseurl/assets/raw.main.css"?>" rel="stylesheet"> -->
    <!-- Favicon -->
    <link rel="stylesheet" href="<?=$baseurl?>/assets/raw/theme/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=$baseurl?>/assets/raw/theme/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=$baseurl?>/assets/raw/theme/css/style.css">

    <style>
    input[type="text"] {
        border-radius: 2px;
    }

    .timeline {
        height: 100px;
        margin: 1em;
        margin-bottom: 4rem;
        line-height: 100px;
        position: relative;
        text-align: center;
    }

    .timeline:before {
        content: '';
        position: absolute;
        width: 80%;
        top: 50%;
        left: 10%;
        height: 5px;
        margin-top: -2px;
        background: linear-gradient(to right, #84d9d2, #07cdae);
    }

    .event {
        width: 25px;
        height: 25px;
        position: relative;
        margin: 0 70px;
        display: inline-block;
        vertical-align: middle;
        border-radius: 50%;
        background: #fff;
        /* make border with green color */
        border: 2px solid #07cdae;
    }

    .event-active {
        background: #07cdae;
        box-shadow: 0 0 10px #07cdae;
    }

    .detail {
        width: 200px;
        height: 20px;
        position: absolute;
        line-height: 1.4em;
        left: -90px;
        color:#07cdae;
    }

    .down .detail {
        font-weight: bold;
        bottom: -50px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        border-radius: 2px;
        color: #ccc;
        font-size: 14px;
        margin-left: 12px;
    }

    #datepicker {
        border-radius: 2px;
        background-color: #fff;
    }

    .swal-button--open {
        /* button color soft green */
        background-color: #4caf50;
    }

    .swal-button--copy {
        /* button color blue */
        background-color: #2196f3;
    }

    .ck-editor__editable_inline {
        padding: 0 25px !important;
        min-height: 150px;
    }

    .table-container {
        overflow-x: auto;
    }

    .text-sm {
        font-size: 12px;
    }

    .highlighted {
        color: #b66dff;
    }
    
    </style>
</head>

<body>
    <header>

    </header>