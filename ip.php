<?php
$ips=$_SERVER['REMOTE_ADDR'];
$path="logs-ip.txt";
$file=fopen($path, "a+");
$write=fwrite($file,"$ips\n");
fclose($file);
?>

