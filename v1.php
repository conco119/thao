<?php
require_once "inc/init.php";

if(!$loginCheck)
{
    header("Location: ".'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}");
    exit;
}


$mc = isset($_GET['mc']) ? $_GET['mc'] : "home";
$site = isset($_GET['site']) ? $_GET['site'] : "index";

$file = ucfirst($mc) . ".php";
$class = ucfirst($mc);
$mc = ucfirst($mc);

require_once 'api/' . $file;
$use = new $class;
$use->$site();

# ------------------------------------- #
