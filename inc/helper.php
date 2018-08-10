<?php
function reload($url=THIS_LINK)
{
    echo "<script> window.location = '".$url."' </script>";
    exit();
}
function lib_redirect_back(){
    echo "<script> history.go(-1); </script>";
    exit();
}

function pre($var, $is_dump = 0)
{
    echo "<pre>";
    $is_dump == 0 ? print_r($var) : var_dump($var);
    echo "</pre>";
}
function lib_redirect($url = DOMAIN)
{
    echo "<script> window.location = '".$url."' </script>";
    exit();
}
