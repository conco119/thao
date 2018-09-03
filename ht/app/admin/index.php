<?php
ob_start();
ini_set('display_errors', 1);
session_start();
require_once '../../index.php';
require_once '../common/Method.php';
require_once '../common/HelpAbstract.php';
require_once '../common/Helper.php';
require_once './controller/Main.php';
$login_id = isset($_SESSION["LOGIN_MEMBER"]) ? intval($_SESSION["LOGIN_MEMBER"]) : 0;
$mc = isset($_GET['mc']) ? $_GET['mc'] : "home";
$site = isset($_GET['site']) ? $_GET['site'] : "index";
$tpl_file = "../" . $mc . "/" . $site . ".tpl";
$file = ucfirst($mc) . ".php";
$class = ucfirst($mc);
$mc = ucfirst($mc);
if (file_exists("./helper/" . $mc . "Helper" . ".php")) {
    require_once "./helper/" . $mc . "Helper" . ".php";
}
require_once './controller/' . $file;
$use = new $class;
$use->$site();
