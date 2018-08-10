<?php
spl_autoload_register(function($name){
    require 'lib/'.strtolower($name).'.class.php';
});
$config = array(
	//DATABASE CONFIG
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '1234',
	'dbname' => 'fb_work_thatim5',

	//ANOTHER

	'ADMIN_PASSWORD' => 'hanoi1233',

	//CARD PAYMENT: BanThe247
	'BanThe247_secretKey' => '769305097_104634_D247',
	'BanThe247_partnerId' => '23219'
);
header("Content-Type:text/html;charset=utf-8");
date_default_timezone_set('Asia/Ho_Chi_Minh');
error_reporting(E_ALL);
session_start();
$config['client'] = array(
  "ip" => $_SERVER['REMOTE_ADDR'],
  "useragent" => $_SERVER['HTTP_USER_AGENT']
);
$client = new CLIENT($config);
$loginCheck = isset($_SESSION['userLogin'], $_SESSION['userData']) && $_SESSION['userLogin'] == $_SESSION['userData']->key ? true : false;
if($loginCheck){
	$client->_reloadUSER($_SESSION['userData']);
	$userData = $_SESSION['userData'];
 }else{
	 unset($_SESSION['userData']);
	 unset($_SESSION['userLogin']);
 }
