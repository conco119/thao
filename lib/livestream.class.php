<?php
class LIVESTREAM extends SERVER{
    public function ussv($url, $post = array()){
        $token = 'SNkqbFdjcBrZtOYwkwwKP5zdPPMtvcIP3/Y++jGQ+MoiYnJMm/d4I15KVXByOIYyUp8vUWV3VTAQnBSHeFthgOMMQvxM1vAvXcryccYnoIQs8K09QBsbQHKIFQeRz5bleksuYfsjfKCPnD5UCv9KYi6SOtsfJBjiwg+4iaNfLB6lcU1MZnBhh0UUGg4xSnilmGZC4EWW7AKmH9Di4NMlHg==';
		$post['uss_token'] = $token;
		$posts = http_build_query($post);
		$ch = curl_init();
					curl_setopt ($ch, CURLOPT_URL, $url);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
				    curl_setopt($ch, CURLOPT_POST, 1);
				    curl_setopt($ch, CURLOPT_POSTFIELDS, $posts);
					$file_contents = curl_exec($ch);
					curl_close($ch);
		return json_decode($file_contents);
	}
	public function adduid(&$userINFO, $uid, $viewers , $month){
	    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int)($userINFO->id).'"');
        if($check->num_rows > 0){
             $userINFO = $check->fetch_object();
              $checkVIP = $this->_sql->query('SELECT * FROM `livestream` WHERE `username` = "'.$userINFO->username.'"');
              
              if($checkVIP->num_rows > 0){
                  $viplive = $checkVIP->fetch_object();
                  $data = json_decode($viplive->data);
              }else{
                  $data = array();
              }
              $price = 1500 * (int) $viewers * (int) $month;
              if($price > $userINFO->lstream_balance){
                   $this->_return($return, false, 'Không đủ tiền trong tài khoản');
              }else{
               $post = array();
             $post['uid'] = $uid;
             $post['viewers'] = $viewers;
             $post['month'] = $month;
              $add = $this->ussv('https://uss-like.ussv.net/api/tools/lstream.php?action=orderVip',$post);
              
              if(strpos($add->message,"thành công") != false){
                  array_push($data,$add->orderInfo->id);
                  
                  $update = $this->_sql->query('UPDATE `users` SET `lstream_balance` = `lstream_balance` - '.(int) $price.' WHERE `id` = "'.(int) $userINFO->id.'"');
                  
                  if($checkVIP->num_rows > 0){
                    $update2 = $this->_sql->query('UPDATE `livestream` SET `data` = "'.mysqli_real_escape_string($this->_sql,json_encode($data)).'" WHERE `username` = "'.$userINFO->username.'"');
                  }else{
                      $insert = $this->_sql->query('INSERT INTO `livestream`(`username`, `data`) VALUES ("'.$userINFO->username.'", "'.mysqli_real_escape_string($this->_sql,json_encode($data)).'")');
                  }
                  if($this->_sql->errno == 0){
                                        $this->_return($return, true, "Set tài khoản thành công");
                                    }else{
                                        $this->_return($return, false, 'Có lỗi trong quá trình tạo vip' . json_encode($data), ['mysql' => $this->_sql->error]);
                                    }
              }else{
                   $this->_return($return, false, 'Lỗi '. $add->message);
                  
              }
              }
        }else{
            $this->_return($return, false, 'User is not existed yet !!');
        }
        return $return;
	}
	public function tangview(&$userINFO, $videoId,$viewers,$viewers_per_1,$viewers_per_2,$time_per_1,$time_per_2){
	    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int)($userINFO->id).'"');
        if($check->num_rows > 0){
             $userINFO = $check->fetch_object();
              $checkVIP = $this->_sql->query('SELECT * FROM `tangview` WHERE `username` = "'.$userINFO->username.'"');
              
              if($checkVIP->num_rows > 0){
                  $viplive = $checkVIP->fetch_object();
                  $data = json_decode($viplive->data);
              }else{
                  $data = array();
              }
              $price = 10 * (int) $viewers;
              if($price > $userINFO->lstream_balance){
                   $this->_return($return, false, 'Không đủ tiền trong tài khoản');
              }else{
               $post = array();
             $post['videoId'] = $videoId;
             $post['views'] = $viewers;
             $post['viewers_per_1'] = $viewers_per_1;
             $post['viewers_per_1'] = $viewers_per_2;
             $post['time_per_1'] = $time_per_1;
             $post['time_per_2'] = $time_per_2;
              $add = $this->ussv('https://uss-like.ussv.net/api/tools/lstream.php?action=orderViews',$post);
              
              if(strpos($add->message,"thành công") != false){
                  array_push($data,$add->orderId);
                  
                  $update = $this->_sql->query('UPDATE `users` SET `lstream_balance` = `lstream_balance` - '.(int) $price.' WHERE `id` = "'.(int) $userINFO->id.'"');
                  
                  if($checkVIP->num_rows > 0){
                    $update2 = $this->_sql->query('UPDATE `tangview` SET `data` = "'.mysqli_real_escape_string($this->_sql,json_encode($data)).'" WHERE `username` = "'.$userINFO->username.'"');
                  }else{
                      $insert = $this->_sql->query('INSERT INTO `tangview`(`username`, `data`) VALUES ("'.$userINFO->username.'", "'.mysqli_real_escape_string($this->_sql,json_encode($data)).'")');
                  }
                  if($this->_sql->errno == 0){
                                        $this->_return($return, true, "Set tài khoản thành công");
                                    }else{
                                        $this->_return($return, false, 'Có lỗi trong quá trình tạo vip', ['mysql' => $this->_sql->error]);
                                    }
              }else{
                   $this->_return($return, false, 'Lỗi '. $add->message);
                  
              }
              }
        }else{
            $this->_return($return, false, 'User is not existed yet !!');
        }
        return $return;
	}
	public function thongkeviews(&$userINFO){
	    $return = array();
	    $check = $this->ussv('https://uss-like.ussv.net/api/tools/lstream.php?action=getOrders&status=0&type=VIEWS_VIDEO');
	    $checkVIP = $this->_sql->query('SELECT * FROM `tangview` WHERE `username` = "'.$userINFO->username.'"');
	    if($checkVIP->num_rows > 0){
	          $return = array();
	        $viplive = $checkVIP->fetch_object();
	        $data = json_decode($viplive->data);
	        foreach($check->data as $key=>$item){
	            if(in_array($item->id,$data)){
	                array_push($return,$item);
	            }
	        }
	        
	    }
	    return $return;
	}
	public function thongke(&$userINFO){
	    $return = array();
	    $check = $this->ussv('https://uss-like.ussv.net/api/tools/lstream.php?action=getOrdersVip&status=0');
	    $checkVIP = $this->_sql->query('SELECT * FROM `livestream` WHERE `username` = "'.$userINFO->username.'"');
	    if($checkVIP->num_rows > 0){
	          $return = array();
	        $viplive = $checkVIP->fetch_object();
	        $data = json_decode($viplive->data);
	        foreach($check->data as $key=>$item){
	            if(in_array((int) $item->id,$data)){
	                array_push($return,$item);
	            }
	        }
	        
	    }
	    return $return;
	}
}
?>