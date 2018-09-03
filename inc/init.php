<?php
/**
 ***                SA Team (SAT-CODING)
 ***                    Copyright(c) 2017 by SAT.
 ***
 **/
session_start();
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Saigon');
error_reporting(E_ALL);
ini_set('display_errors', 0);
include 'autoload.php';
include 'global.php';
include 'helper.php';

$config['client'] = array(
    "ip" => $_SERVER['REMOTE_ADDR'],
    "useragent" => $_SERVER['HTTP_USER_AGENT'],
);
// model
$vip_model = new VIP_MODEL($config);
$maintenance_model = new MAINTENANCE_MODEL($config);
$notification_model = new NOTIFICATION_MODEL($config);
$cmt_model = new CMT_MODEL($config);
$tha_tim = new THA_TIM($config);

//
$client = new CLIENT($config);
$adminlib = new ADMIN($config);
$lstream = new LIVESTREAM($config);
define('SAT_API', true);
ignore_user_abort(true);
set_time_limit(0);

$loginCheck = isset($_SESSION['userLogin'], $_SESSION['userData']) && $_SESSION['userLogin'] == $_SESSION['userData']->key ? true : false;
if ($loginCheck) {
    $client->_reloadUSER($_SESSION['userData']);
    $userData = $_SESSION['userData'];
    $_SESSION['LOGIN_MEMBER'] = $userData->id;
} else {
    unset($_SESSION['userData']);
    unset($_SESSION['userLogin']);
}

$s = file_get_contents('php://input');
extract($s == false ? [] : json_decode($s, true));

//for the nav
