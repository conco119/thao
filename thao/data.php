<?php
include_once '../inc/init.php';
if(!$loginCheck || $userData->username != $config['ADMIN_USER']){
echo 'Bố mày xin.';
exit;
}
header('Content-Type: application/json');
extract($_REQUEST);
if(!isset($mode)){
echo json_encode($adminlib->_getAllUser());
}else{
    if($mode == "congtien"){
        echo json_encode($adminlib->_congtien($user, $money));
    }else if($mode == "congtien2"){
          echo json_encode($adminlib->_congtien2($user, $money));
    }else if($mode == "doipass"){
          echo json_encode($adminlib->_setpass($uid, $newpass));
    }else if($mode == "vip"){
        echo json_encode($adminlib->_getAllVIP());
    }else if($mode == "log"){
        echo json_encode($adminlib->_getAlllog());
    }else if($mode == "ATM"){
        echo json_encode($adminlib->_getAllATM());
    }
}
?>