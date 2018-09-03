<?php
define("THIS_LINK", "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define("DOMAIN", "http://" . $_SERVER['HTTP_HOST'] . '/thao/viplike/ht/');
define("ADMIN_PAGE", DOMAIN . "admin");
define("USER_PAGE", DOMAIN);
define("LOGIN_PAGE", DOMAIN . "?mc=pub&site=login");
define("DENIED_PAGE", DOMAIN . "?mc=pub&site=denied");
