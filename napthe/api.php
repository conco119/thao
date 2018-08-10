<?php

include_once '../configs.php';
header('Content-Type: application/json');

if(!$loginCheck){
    $msg = array('msg' => 'Bạn chưa đăng nhập');
    echo json_encode($msg);
    exit;
}
function sql(){
    return new mysqli('localhost', 'dichvufa_viplike', 'Hanoi123@', 'dichvufa_viplike');
}


function curl($url,$post = false,$ref = '', $cookie = false,$follow = false,$cookies = false,$header = true,$headers = false)
{
    $ch=curl_init($url);
    if($ref != '') {
        curl_setopt($ch, CURLOPT_REFERER, $ref);
    }
    if($cookie){
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if($cookies)
    {
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookies);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookies);
    }
    if($post){
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    }
    if($follow) curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if($header)     curl_setopt($ch, CURLOPT_HEADER, 1);
    if($headers)        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);

        //curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    $result[0] = curl_exec($ch);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $result[1] = substr($result[0], $header_size);
    curl_close($ch);
    return $result;

}

function getcookie($content){
    preg_match_all('/Set-Cookie: (.*);/U',$content,$temp);
    $cookie = $temp[1];
    $cookies = "";
    $a = array();
    foreach($cookie as $c){
        $pos = strpos($c, "=");
        $key = substr($c, 0, $pos);
        $val = substr($c, $pos+1);
        $a[$key] = $val;
    }
    foreach($a as $b => $c){
        $cookies .= "{$b}={$c};";
    }
    return $cookies;
}




extract($_REQUEST);
 if(isset($action)){
     $msg = array();
     switch($action){
	              case 'napthe':
    	               $card_type_id = addslashes($card_type_id);
    	               $pin = str_replace(' ', '',addslashes($pin));
    	               $seri = str_replace(' ', '',addslashes($seri));

        			$username = 'waoboy8k@gmail.com'; // TK của bạn
        			$password = 'Hanoi123'; // Mk của bạn
        
                    $TxtCard  = $card_type_id;// type=viettel
                    $TxtMaThe = $pin;
                    $TxtSeri  = $seri;
                    $note = 'Ghi chú'; // Ghi chú hiển thị trong lịch sử nạp
                    $result = curl('https://uzipay.com');
                    $cook = getcookie($result[0]);
                    $post = 'email='.$username.'&password='.$password;
                    $result = curl('https://uzipay.com/login.html',$post,'',$cook);
                    $post = 'type='.$TxtCard.'&code='.$TxtMaThe.'&serial='.$TxtSeri.'&ghichu='.$note;
                    $result = curl('https://uzipay.com/transaction',$post,'',$cook);
                    $response = json_decode($result[1],true);
                    $ResCode = 0;
                    if($response['err'] == 0){
                    	//Trả về kết quả đúng
                        $ResCode = 1;
                        $amount = $response['amount']; // Mệnh giá card
        
                    }
   
        if ($ResCode == 1) {
       $naptien =      sql()->query('UPDATE `users` SET `balance` =`balance` + '.($amount).' WHERE `username` = "'.$userData->username.'"');
$log =  sql()->query('INSERT INTO `log_the`(`username`,`menhgia`,`seri`,`mathe`) VALUES("'.$userData->username.'","'.($amount).'","'.$seri.'","'.$pin.'")');
		
      if($naptien){
          $msg['msg'] = 'Bạn đã nạp thẻ thành công với mệnh giá thẻ '.($amount).' VND';
      }else{
          $msg['msg'] = 'Bạn đã nạp thẻ thành công nhưng hệ thống bị lỗi chưa cộng tiền. Pm admin để biết thêm';
      }
            
        }else{
            $msg['msg'] = $response['msg'];
        }
	    
	     break;
	           
	   default:
       $msg['loi'] = 1;
       break;
    
  }
 }else{
     header("Location: " . $home);
     exit;
 }
if(@$msg){
   echo json_encode($msg);
}
?>