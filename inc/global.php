<?php
$config = array(

	'SITE_LOCATION' => 'http'.(isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}",
	//'SITE_ADMIN' => '',
	//DATABASE CONFIG
	'host' => 'localhost',
	'user' => 'root',
	'pass' => '1234',
	'dbname' => 'fb_work_thatim5',
    'token' => 'EAAAAUaZA8jlABAEkfbNLMrFQatEZC1c58gEdxDIMwJDoXOSGRehaSmXF59gkfIT8NY7pBtDf1PZAagyHwsE7nn5YUJCkUeaeokZAuRCTxhVm3z6qQQix69l89bAVwzAjl991JDdyASCTJvC2kDSy3juxjIUY58KlulrkiU4OuAZDZD',

	//ANOTHER

	'MAX_ACCOUNT_LOGIN_perIP' => 1111125, //Số lượng tài khoản đăng nhập tối đa trên 1 IP
	'ADMIN_USER' => 'admin',
    'maxsv' => 100
);
$gois = array(
    1 => '20->100',
    2 => '100->200',
    3 => '300->400',
    4 => '500->600',
    5 => '700->800',
    6 => '1000->1200'
);
$goirule =[
1 => ["sv1","sv2","sv3","sv4","sv5","sv6","sv7","sv8","sv9","sv10","sv11","sv12","sv13","sv21","sv22","sv23","sv24","sv26","sv27","sv28","sv29","sv30","sv31","sv32","sv33","sv34","sv35","sv36","sv37","sv38","sv39","sv40","sv41","sv42"],
2 => ["sv1","sv2","sv3","sv4","sv5","sv6","sv7","sv8","sv9","sv10","sv11","sv12","sv13","sv21","sv22","sv23","sv24","sv26","sv27","sv28","sv29","sv30","sv31","sv32","sv33","sv34","sv35","sv36","sv37","sv38","sv39","sv40","sv41","sv42"],
3 => ["sv101","sv102","sv103","sv104","sv105","sv106"],
4 => ["sv101","sv102","sv103","sv104","sv105","sv106"],
5 => ["sv201"],
6 => ["sv201"]
];
$DEFAULT_MSGS = file(dirname(__FILE__).'/../list_comments.txt');
define("THIS_LINK", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define("DOMAIN", "http://$_SERVER[HTTP_HOST]" . "/thao/viplike");
