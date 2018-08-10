<?php

function SonicQ12_autoload($name){
	$path = dirname(dirname(__FILE__)).'/lib/'.strtolower($name).'.class.php';
	if(!file_exists($path))
		die('Can\'t found CLASS '.$path."<p></p>".(__FILE__ .' - '.__FUNCTION__ .' - '.__LINE__));
	include($path);
	return $path;
}

spl_autoload_register('SonicQ12_autoload');
