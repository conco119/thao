<?php
extract($_POST);
$fp = fopen('fb.txt','a+');
// $uid = explode('|',base64_decode($cookie))[0];
fwrite($fp, $acc."\n");
fclose($fp);