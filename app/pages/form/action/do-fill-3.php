<?php

// make input to database based on table forms
include_once '../../../../system/config/base.php';

// return all request
$post = $_POST;

return header("Location: ".routes('form/fill/4', getUri(7)));
