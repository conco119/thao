<?php
include_once 'caidats.php';
header('Content-Type: application/json');
$chualogin = (!isset($_SESSION['thatim']) && empty($_SESSION['thatim']))? true : false;
extract($_POST);
$msg = array();

if($chualogin){
    switch($action){
	case 'dangnhap':
	    $username = addslashes($username);
	    $password = addslashes($password);
	    $msg['msg'] = dangnhap($username,$password);
    break;
    case 'dangky':
	   $username = addslashes($username);
	    $password = addslashes($password);
	    $repassword = addslashes($repassword);
	    $captcha= addslashes($captcha);
	    if(!$username || !$password || !$repassword || !$captcha){
	        $msg['msg'] = 'Vui lòng nhập đầy đủ thông tin.';
	    }else if($password != $repassword){
	        $msg['msg'] = 'Vui lòng nhập lại đúng mật khẩu.';
	    }else if($captcha != $_SESSION['security_code']){
	        $msg['msg'] = 'Vui lòng nhập đúng mã kiểm tra.';
	    }else{
	        $msg['msg'] = dangky($username,$password);
	    }
    break;
    
    default:
       $msg['msg'] = 'Không có hành động gì.';
  }
}else{
$username = addslashes($_SESSION['thatim']);
$check = sql()->query("SELECT * FROM users WHERE username='$username'");
$row = mysqli_fetch_array($check);    
   switch($action){
    case 'addVIP':
        $uid = addslashes($uid);
        $goi = addslashes($goi);
        $handung = addslashes($handung);
        $type = addslashes($type);
        $chuthich = addslashes($chuthich);
        
        if (!preg_match('/^[0-9]+$/', $uid, $matches) || !preg_match('/^[0-9]+$/', $goi, $matches2) || !preg_match('/^[0-9]+$/', $handung, $matches3) || empty($type) ||empty($chuthich) ) {
            $msg['msg'] = 'Vui lòng nhập đúng dữ liệu';
      
       }else{
           $checkcron = sql()->query('SELECT * FROM `VIP` ORDER BY `cron` DESC');
            $vips = array();
		while($vip = $checkcron->fetch_object()){
		    
			$vips[] = $vip;
			
		}
           $a = $vips[0]->cron;
           $checkcron2 = sql()->query('SELECT * FROM `VIP` WHERE `cron`="'.$a.'"');
           if($checkcron2->num_rows > 0 && $checkcron2->num_rows <=19){
          $msg['msg'] = _addVIP(array($uid,$goi,$type,$handung,$chuthich,$row['id'],$row['money'],$a)) . 'hihi';
           } else {
             $call = array(
      
        'cpanel_jsonapi_module' => "Cron",
        'cpanel_jsonapi_func' => "add_line",
        'cpanel_jsonapi_apiversion' => '2',
        'minute' => '*/20',
        'hour' => '*',
        'day' => '*',
        'month' => '*',
        'weekday' => '*',
        'command' => 'php -f '.$folder.'cron.php id='.($a + 1));

        $kq = json_decode(query($call));
        $key = $kq->{'cpanelresult'}->{'data'}[0]->{'linekey'};
               $msg['msg'] = _addVIP(array($uid,$goi,$type,$handung,$chuthich,$row['id'],$row['money'],($a + 1))) . $key;
           }
       }
       
    break;
    case 'removeVIP':
       $id = addslashes($id);
       $username = addslashes($_SESSION['thatim']);
$check = sql()->query("SELECT * FROM users WHERE username='$username'");
$row = mysqli_fetch_array($check);
       if (preg_match('/^[0-9]+$/', $id, $matches4)){
          $msg['msg'] = _removeVip($id,$row['id']);
       }else{
            $msg['msg'] = 'Lỗi';
       }
    break;
    case 'thoat':
	   session_unset(); 
      session_destroy(); 
     $msg['msg'] = 'Tạm biệt';
    break;
    default:
       $msg['msg'] = 'Không có hành động gì.';
  }
}
if(@$msg){
    echo json_encode($msg);
}
?>