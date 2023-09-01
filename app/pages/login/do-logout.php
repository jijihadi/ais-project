<?php
include_once '../../../system/view/header.php';

session_destroy();
header("Location:".routes('login'));