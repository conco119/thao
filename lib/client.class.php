<?php
class CLIENT extends SERVER{
  public function _getSystemConfig(){
    $prices = $this->_sql->query('SELECT * FROM `system_prices` WHERE 1');
    $config->goi = $prices->fetch_object();
     $this->_arrconfig = array_merge($this->_arrconfig, (array)$config);
    $this->_reloadConfig();
    return $this->_config;
  }
  public function _getStats(){
    $q = $this->_sql->query('SELECT (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv1") as sv1,
                            (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv2") as sv2,
                            (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv3") as sv3,
                            (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv4") as sv4,
                             (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv5") as sv5,
                             (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv6") as sv6,
                             (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv7") as sv7,
                              (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv8") as sv8,
                               (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv9") as sv9,
                                (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv10") as sv10,
                                    (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv11") as sv11,
                               (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv12") as sv12,
                                (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv13") as sv13,


                                           (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv21") as sv21,
                                            (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv22") as sv22,
                                             (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv23") as sv23,
                                                (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv24") as sv24,
                                                      (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv26") as sv26,
                                           (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv27") as sv27,

                                           (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv28") as sv28,
                                           (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv29") as sv29,
                                           (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv30") as sv30,
                                                 (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv31") as sv31,
                                           (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv32") as sv32,
                                           (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv33") as sv33,
                                          (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv34") as sv34,
                                              (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv35") as sv35,
                                                (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv36") as sv36,
                                            (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv37") as sv37,
                                               (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv38") as sv38,

                                                (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv39") as sv39,

                                                             (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv40") as sv40,









                                              (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv41") as sv41,
                                               (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv42") as sv42,
                              (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv42") as sv42,


                             (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv101") as sv101,
                               (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv102") as sv102,
                                (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv103") as sv103,
                                    (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv104") as sv104,
                                     (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv105") as sv105,
                                      (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv106") as sv106,

                             (SELECT COUNT(vip.id) FROM vip WHERE sever = "sv201") as sv201

                        ')->fetch_object();
    return $q;
  }
  public function _upSQL($data){
    return $this->_sql->multi_query($data);
  }
  public function _getforCron($sv){
      $data= array();
  $vips = $this->_sql->query('SELECT * FROM `vip` WHERE `sever` = "'.$sv.'" AND `expire` > '.time());

      if($vips->num_rows > 0){
        while($v = $vips->fetch_object()){
          $data[] = $v;
        }
      }
    return $data;
  }
  public function _reloadUSER(&$userINFO){
    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
    $x = $check->fetch_object();
    @$x->key = $userINFO->key;
    $userINFO = $x;
    return true;
  }
  public function _exBalance(&$userINFO, $receiver, $amount = 0){
      $amount = (int) $amount;
      if($amount > 0){
            $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
            if($check->num_rows > 0){
                $uFetch = $check->fetch_object();
                $cReceive = $this->_sql->query('SELECT * FROM `users` WHERE `username` = "'.addslashes($receiver).'"');
                if($cReceive->num_rows > 0){
                    if((int)$uFetch->balance >= $amount){
                        $subtract = $this->_sql->query('UPDATE `users` SET `balance` = `balance` - '.(int) $amount.' WHERE `id` = "'.(int) $userINFO->id.'"');
                        if($this->_sql->errno == 0){
                            $log = $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.(int) $userINFO->id.'", "-'.(int) $amount.'", "Chuyển khoản giữa '.addslashes($userINFO->username).' và '.addslashes($receiver).'", '.($this->errno == 0 ? 1 : $this->errno).')');
                            $addition = $this->_sql->query('UPDATE `users` SET `balance` = `balance` + '.(int) $amount.' WHERE `username` = "'.addslashes($receiver).'"');
                            if($this->_sql->errno == 0){
                                $this->_return($return, true, 'CHUYỂN KHOẢN THÀNH CÔNG !!');
                            }else{
                                $this->_return($return, false, 'ERROR (052) LỖI CHUYỂN KHOẢN', ['sql' => $this->_sql->error]);
                            }
                        }else{
                            $log = $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.(int) $userINFO->id.'", "-'.(int) $amount.'", "Chuyển khoản giữa '.addslashes($userINFO->username).' và '.addslashes($receiver).'", '.($this->errno == 0 ? 1 : $this->errno).')');
                            $this->_return($return, false, 'ERROR (051) LỖI CHUYỂN KHOẢN', ['sql' => $this->_sql->error]);
                        }
                    }else{
                        $this->_return($return, false, 'ERROR (040) Tài khoản không đủ tiền');
                    }
                }else{
                  $this->_return($return, false, 'ERROR(030) Tài khoản người nhận không tồn tại');
                }
            }else{
                $this->_return($return, false, 'ERROR(020) Tài khoản người gửi không hợp lệ');
            }
      }else{
          $this->_return($return, false, 'ERROR(010) Số tiền không hợp lệ');
      }
      return $return;
  }
  public function _exBalanceltream(&$userINFO, $receiver, $amount = 0){
      $amount = (int) $amount;
      if($amount > 0){
            $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
            if($check->num_rows > 0){
                $uFetch = $check->fetch_object();
                $cReceive = $this->_sql->query('SELECT * FROM `users` WHERE `username` = "'.addslashes($receiver).'"');
                if($cReceive->num_rows > 0){
                    if((int)$uFetch->lstream_balance >= $amount){
                        $subtract = $this->_sql->query('UPDATE `users` SET `lstream_balance` = `lstream_balance` - '.(int) $amount.' WHERE `id` = "'.(int) $userINFO->id.'"');
                        if($this->_sql->errno == 0){
                            $log = $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.(int) $userINFO->id.'", "-'.(int) $amount.'", "Chuyển khoản giữa '.addslashes($userINFO->username).' và '.addslashes($receiver).'", '.($this->errno == 0 ? 1 : $this->errno).')');
                            $addition = $this->_sql->query('UPDATE `users` SET `lstream_balance` = `lstream_balance` + '.(int) $amount.' WHERE `username` = "'.addslashes($receiver).'"');
                            if($this->_sql->errno == 0){
                                $this->_return($return, true, 'CHUYỂN KHOẢN THÀNH CÔNG !!');
                            }else{
                                $this->_return($return, false, 'ERROR (052) LỖI CHUYỂN KHOẢN', ['sql' => $this->_sql->error]);
                            }
                        }else{
                            $log = $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.(int) $userINFO->id.'", "-'.(int) $amount.'", "Chuyển khoản giữa '.addslashes($userINFO->username).' và '.addslashes($receiver).'", '.($this->errno == 0 ? 1 : $this->errno).')');
                            $this->_return($return, false, 'ERROR (051) LỖI CHUYỂN KHOẢN', ['sql' => $this->_sql->error]);
                        }
                    }else{
                        $this->_return($return, false, 'ERROR (040) Tài khoản không đủ tiền');
                    }
                }else{
                  $this->_return($return, false, 'ERROR(030) Tài khoản người nhận không tồn tại');
                }
            }else{
                $this->_return($return, false, 'ERROR(020) Tài khoản người gửi không hợp lệ');
            }
      }else{
          $this->_return($return, false, 'ERROR(010) Số tiền không hợp lệ');
      }
      return $return;
  }
  public function _setFacebook(&$userINFO, $token){
    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
    if($check->num_rows > 0){
      $checkToken = $this->_fbgraph($token);
      if(!isset($checkToken->error)){
        $checkExists = $this->_sql->query('SELECT * FROM `users` WHERE `fbid` = "'.addslashes( $checkToken->id ).'"');
        if($checkExists->num_rows > 0){
          $this->_return($return, false, 'Facebook này đã được tích hợp trên 1 tài khoản khác !! vui lòng chọn 1 facebook khác');
        }else{
          $update = $this->_sql->query('UPDATE `users` SET `fbid` = "'.addslashes($checkToken->id).'" WHERE `id` = "'.(int) $userINFO->id.'"');
          if($this->_sql->errno == 0){
            $this->_return($return, true, 'Tích hợp tài khoản facebook vào tài khoản hệ thống thành công, bạn có thể sử dụng token của facebook này để đăng nhập vào hệ thống !!');
          }else{
            $this->_return($return, false, 'Có lỗi bất ngờ xảy ra trong quá trình tích hợp, vui lòng liên hệ admin', ['mysql' => $this->_sql->error]);
          }
        }
      }else{
        $this->_return($return, false, 'TOKEN DIE !!!');
      }
    }else{
      $this->_return($return, false, 'USER không tồn tại !!!');
    }
    return $return;
  }
  public function _register($username = '', $password = ''){
      if(trim($username) != '' && trim($password) != ''){
          if(mb_strlen($username, 'UTF-8') < 5 && mb_strlen($password, 'UTF-8') < 5 ){
                $this->_return($return, false, 'Tài khoản và mật khẩu trên 5 kí tự');
          }else{
          $check = $this->_sql->query('SELECT * FROM `users` WHERE `username` = "'.addslashes($username).'"');
          if($check->num_rows > 0){
              $this->_return($return, false, 'USER EXISTED YET');
          }else{

              $insert = $this->_sql->query('INSERT INTO `users`(`username`, `password`) VALUES("'.addslashes($username).'", "'.addslashes($password).'")');
              if($this->_sql->errno == 0){
                  $this->_return($return, true, 'Registered !!');
              }else{
                  $this->_return($return, false, 'UNEXPECTED ERROR', ["mysql_error" => $this->_sql->error]);
              }
          }
          }
      }else{
          $this->_return($return, false, 'INVAILD USERNAME/PASSWORD');
      }
      return $return;
  }
  public function _login($username = '', $password = '', $token = ''){
    if(trim($token) != ''){
      $getFbid = $this->_fbgraph($token);
      $login_token = true;
      $encrypt = md5(time().rand(00000,9999999));
    }else{
      $login_token = false;
      $getFbid = (object) array('id' => md5($username.$password.rand(000,9999)));
      $encrypt = $password;
    }
    if($login_token == true && isset($getFbid->error)){
      $this->_return($return, false, 'TOKEN DIED !!');
    }else{
      $check = $this->_sql->query('SELECT * FROM `users` WHERE (`username` = "'.addslashes($username).'" AND `password` = "'.addslashes($encrypt).'") OR `fbid` = "'.addslashes($getFbid->id).'"');
      if($check->num_rows > 0){
        /*
        login_status: @ip: client ip
                      @status: 0 - logout; 1 - using; 99 - blocked
        */
        $checkIP = $this->_sql->query('SELECT * FROM `login_status` WHERE `ip_login` = "'.addslashes($this->_config->client->ip).'" AND `status` = 1 AND `user_id` != (SELECT `id` FROM users WHERE `username` = "'.addslashes($username).'")');
        if($checkIP->num_rows > $this->_config->MAX_ACCOUNT_LOGIN_perIP){
          $cIP = $checkIP->fetch_object();
          $blockTime = time()+15*60;
          if($cIP->login_time < 5){
            $this->_return($return, false, 'Can\'t login more than '.$this->_config->MAX_ACCOUNT_LOGIN_perIP.' account(s) on 1 machine');
            $update_loginStatus = $this->_sql->query('UPDATE `login_status` SET `login_time` = `login_time` + 1 WHERE `ip` = "'.addslashes($this->_config->client->ip).'"');
          }else{
            $this->_return($return, false, 'You are blocked in 15 minute(s), Try again after blocking time');
            if($cIP->block_time < time()){
              $block = $this->_sql->query('UPDATE `login_status` SET `login_time` = 0, `login_status` = 99, `block_time` = "'.($blockTime).'" WHERE `ip` = "'.addslashes($this->_config->client->ip).'"');
            }
          }
        }else{
          if($checkIP->num_rows > 0){
              $cIP = $checkIP->fetch_object();
              if($cIP->block_time <= time()){
                $can_login = true;
                $update = $this->_sql->query('UPDATE `login_status` SET `login_status` = 1, `block_time` = 0 WHERE `ip` = "'.addslashes($this->_config->client->ip).'"');
              }else{
                $can_login = false;
              }
          }
          $cIPUSER = $this->_sql->query('SELECT * FROM `login_Status` WHERE `ip_login` = "'.addslashes($this->_config->client->ip).'" AND `user_id` = (SELECT `id` FROM `users` WHERE `username` = "'.addslashes($username).'")');
          if($cIPUSER->num_rows < 1){
            $this->_sql->query('INSERT INTO `login_status` (`user_id`, `ip_login`) VALUES ((SELECT `id` FROM `users` WHERE `username` = "'.addslashes($username).'"), "'.addslashes($this->_config->client->ip).'")');
            $can_login = true;
          }else{
            $can_login = true;
          }
          if($can_login){
              $update = $this->_sql->query('UPDATE `users` SET `last_ip` = "'.addslashes($this->_config->client->ip).'" WHERE `username` = "'.addslashes($username).'"');
              $this->_return($return, true, 'Success Login', ['data' => $check->fetch_object()]);
          }else{
            $this->_return($return, false, 'Your device is in blocking time, try again !!!');
          }
        }
      }else{
        $this->_return($return, false, 'Sai tên đăng nhập hoặc mật khẩu . Liên hệ Admin để được hỗ trợ ');
      }
    }
    return $return;
  }
  public function _renewCooperator(&$userINFO, $month){ /*Gia hạn CTV*/
    $this->_getSystemConfig();
    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = '.(int) $userINFO->id);
    if($check->num_rows > 0){
      $userINFO = $check->fetch_object();
      $price = (int)$this->_config->prices->cooperator_fee*(int)$month;
      if($userINFO->balance >= $price){
        if(strtotime($userINFO->cooperator_expire) > time()){
          $oldExpire = strtotime($userINFO->cooperator_expire);
        }else{
          $oldExpire = time();
        }
        $expire = strtotime('+'.intval($month).' month', $oldExpire);
        $update = $this->_sql->query('UPDATE `users` SET `balance` = `balance` - '.(int) $price.', `user_type` = 1, `cooperator_expire` = "'.(date('Y-m-d', $expire)).'" WHERE `id` = "'.(int) $userINFO->id.'"');
        if($this->_sql->errno == 0){
            $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.(int) $userINFO->id.'", "-'.(int) $price.'", "gia hạn CTV '.(int) $month.' tháng", 1)');
            $this->_reloadUSER($userINFO);
            $this->_return($return, true, 'gia hạn thành công!!');
        }
      }else{
        $this->_return($return, false, 'Tài khoản không đủ tiền để gia hạn!!');
      }
    }else{
      $this->_return($return, false, 'USER này không tồn tại !!');
    }
    return $return;
  }
  public function _checkCooperatorExpire(&$return, &$userINFO){
    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'" AND UNIX_TIMESTAMP(`cooperator_expire`) < UNIX_TIMESTAMP(NOW())');
    if($check->num_rows > 0){
        $update = $this->_sql->query('UPDATE `users` SET `user_type` = 0 WHERE `id` = "'.(int) $userINFO->id.'"');
        $reload = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
        $userINFO = $reload->fetch_object();
    }else{
      return true;
    }
  }
  /*User/Cooperator Functions*/
  /*
    @vip_type: 1 - VIP LIKE
              2 - VIP COMMENT
  */
  public function _getVIP($userINFO){
    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
    if($check->num_rows > 0){
      $vips = $this->_sql->query('SELECT * FROM `vip` WHERE `owned_by` = "'.$userINFO->username.'"');
      $data = array();

      if($vips->num_rows > 0){
        while($v = $vips->fetch_object()){
          $data[] = $v;
        }
      }
      return $data;
    }
  }

  public function _addVIP(&$userINFO, $fbid, $name = '',$type,$speed,$goi,$expire,$sever)
  {
    $this->_getSystemConfig();
    $sv = $this->_getStats();
    $checktype = true;
    $checktype2 = array("RANDOM","LIKE", "LOVE", "WOW", "SAD","HAHA","ANGRY");
    $checkspeed = array(5,10,15,20);
    $maxsever =  $this->_config->maxsv;
    $tokencheck = $this->_config->token;
    $sever = addslashes($sever);
    $goi = addslashes($goi);
    $checksever = array("sv1","sv2","sv3","sv4","sv5","sv6","sv7","sv8","sv9","sv10","sv11","sv12","sv13","sv14","sv15","sv16","sv17","sv18","sv19","sv20","sv21","sv22","sv23","sv24","sv25","sv26","sv27","sv28","sv29","sv30","sv31","sv32","sv33","sv34","sv35","sv36","sv37","sv38","sv39","sv40","sv41","sv42","sv43","sv44","sv45","sv46","sv47","sv48","sv49","sv50","sv51","sv52","sv53","sv54","sv55","sv56","sv57","sv58","sv59","sv60","sv61","sv62","sv63","sv641","sv65","sv66","sv67","sv68","sv69","sv70");
    $checksever2 = array("sv101","sv102","sv103","sv104","sv105","sv106","sv107","sv108","sv109","sv110","sv111");
    $checksever3 = array("sv201","sv202","sv203","sv204");
    $checkFBID = $this->_fbgraph($tokencheck , $fbid);
    if(isset($checkFBID->error->message)){
        if($checkFBID->error->code == 190){
            $this->_return($return, false, 'Xuất hiện lỗi hệ thống vui lòng báo ADMIN để kịp thời sửa chữa.');

        }else{
            $this->_return($return, false, 'Không tồn tại FACEBOOK ID này vui lòng kiểm tra lại.');
        }
    }else if(isset($checkFBID->id)){
        $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int)($userINFO->id).'"');
        if($check->num_rows > 0){
            $userINFO = $check->fetch_object();
            $checkVIP = $this->_sql->query('SELECT * FROM `vip` WHERE `fbid` = "'.addslashes($fbid).'" AND `expire` > '.time());
            if($checkVIP->num_rows >= 1){

                 $this->_return($return, false, 'FACEBOOK này đã tồn tại trên server. Xoá trước khi cài mới !!!');
            }else{
                if($sv->$sever == null ||  (int) $sv->$sever >= $maxsever){
                    $this->_return($return, false, 'Sever đã quá tải. Chọn sever khác !!!');
                }else{
                    if($this->_config->goi->$goi == null){
                        $this->_return($return, false, 'Không tồn tại gói này !!!');

                    }else{
                        if(in_array($sever,$checksever) && !in_array($goi,array(1,2))){
                            $this->_return($return, false, 'Sever 1 > 100 chỉ được chọn 1 và 2 gói đầu');
                            return $return;
                            exit;
                        }
                        if(in_array($sever,$checksever2) && !in_array($goi,array(3,4))){
                            $this->_return($return, false, 'Sever 101 ~> 200 chỉ được chọn 2 gói 3 4');
                            return $return;
                            exit;
                        }
                        if(in_array($sever,$checksever3) && !in_array($goi,array(5,6))){
                            $this->_return($return, false, 'Sever 201 ~> 300 chỉ được chọn 2 gói 5 6');
                            return $return;
                            exit;
                        }
                        foreach(addslashes($type) as $each_check){
                            if(!in_array($each_check,$checktype2)) $checktype = false;
                        }
                        if($checktype == false || !in_array(addslashes($speed),$checkspeed) || (int) addslashes($expire) <=0 ){
                            $this->_return($return, false, 'BUGG !!!');
                        }else{

                            $price = $this->_config->goi->$goi * (int) addslashes($expire);
                            $expire_timestamp = time() + (int) addslashes($expire)*86400;
                            if((int) $userINFO->balance < $price){
                                $this->_return($return, false, 'Bạn hết xừ tiền ồi !!!');
                            }else{
                                $update = $this->_sql->query('UPDATE `users` SET `balance` = `balance` - '.(int) $price.' WHERE `id` = "'.(int) $userINFO->id.'"');
                                if($this->_sql->errno == 0 && $this->_sql->affected_rows > 0){
                                    $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.$userINFO->username.'", "-'.(int) $price.'", "Mua gói vip '.(int) addslashes($goi).' LIKE cho fbid '.addslashes($fbid).'", 1)');
                                    $insert = $this->_sql->query('INSERT INTO `vip`(`fbid`, `name`, `type`, `speed`, `goi`, `expire`,`sever`,`owned_by`) VALUES ("'.addslashes($fbid).'","'.addslashes($name).'" , "'. mysqli_real_escape_string($this->_sql,json_encode($type)).'", "'.(int) addslashes($speed).'", "'.(int) addslashes($goi).'","'.(int) $expire_timestamp.'","'.addslashes($sever).'","'.$userINFO->username.'")');
                                    if($this->_sql->errno == 0){
                                        $this->_return($return, true, "Mua VIP LIKE thành công cho Facebook [$fbid] ",[],"./vip.php");
                                    }else{
                                        $this->_return($return, false, 'Có lỗi trong quá trình tạo tài khoản vip', ['mysql' => $this->_sql->error]);
                                    }
                                }else{
                                    $this->_return($return, false, 'Có lỗi trong quá trình thanh toán', ['mysql' => $this->_sql->error]);
                                }
                            }
                        }
                    }
                }
            }
        }else{
            $this->_return($return, false, 'User is not existed yet !!');
        }
    }else{
        $this->_return($return, false, 'Lõi : UID Có khoảng trống . Vui lòng coppi hoặc viết rõ ràng');
    }
    return $return;
  }
  public function _buyVIPCMT(&$userINFO, $fbid, $name = '', $amount_limit = 50, $month = 1, $msgs = array()){
    $this->_checkCooperatorExpire($return, $userINFO);
    $this->_getSystemConfig();
    $countVip = $this->_sql->query('SELECT * FROM `vip` WHERE `expire` > CURRENT_DATE()');
    if((int)$countVip->num_rows < (int)$this->_config->MAX_AMOUNT_VIP_ON_SERVER){
        $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int)($userINFO->id).'"');
        if($check->num_rows > 0){
          $userINFO = $check->fetch_object();
          $checkVIP = $this->_sql->query('SELECT * FROM `vip` WHERE `owned_by` = "'.((int) $userINFO->id).'" AND `vip_type` = 2');
          if($userINFO->user_type == 0 && $checkVIP->num_rows >= 1){
            $cVIP = $checkVIP->fetch_object();
            if($cVIP->fbid != $fbid){
              $this->_return($return, false, 'Mỗi user bình thường chỉ có thể mua duy nhất 1 lần vip cho 1 tài khoản !! HOẶC tài khoản CTV của bạn đã hết hạn !! vui lòng gia hạn');
            }else{ // Gia Hạn
              $this->_return($return, false, 'VIP này đã tồn tại trên server !!!');
            }
          }else{
            $checkExist = $this->_sql->query('SELECT * FROM `vip` WHERE `owned_by` = "'.((int) $userINFO->id).'" AND `fbid` = "'.addslashes($fbid).'" AND `vip_type` = 2');
            if($checkExist->num_rows < 1){
              $price = ($this->_config->prices->costperCMT*$amount_limit)*$month;
              $expire_timestamp = strtotime('+'.intval($month).' month');
              if((int) $userINFO->balance >= $price){
                if((int)$userINFO->user_type == 1){
                  $price = $price - ($price*$this->_config->prices->cooperated_discount)/100;
                }
                $update = $this->_sql->query('UPDATE `users` SET `balance` = `balance` - '.(int) $price.' WHERE `id` = "'.(int) $userINFO->id.'"');
                if($this->_sql->errno == 0 && $this->_sql->affected_rows > 0){
                  $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.(int) $userINFO->id.'", "-'.(int) $price.'", "Mua gói vip '.(int) $amount_limit.' CMT cho fbid '.addslashes($fbid).'", 1)');
                  $insert = $this->_sql->query('INSERT INTO `vip`(`name`, `fbid`, `vip_type`, `owned_by`, `amount_limit`, `expire`, `list_comments`) VALUES("'.($userINFO->user_type == 0 ? $userINFO->username : $name).'", "'.addslashes($fbid).'", 2, "'.((int) $userINFO->id).'", "'.(int) $amount_limit.'", "'.addslashes(date('Y-m-d', $expire_timestamp)).'", "'.addslashes(json_encode($msgs)).'")');
                  if($this->_sql->errno == 0){
                    $this->_return($return, true, "Mua VIP CMT thành công cho Facebook [$fbid]");
                  }else{
                    $this->_return($return, false, 'Có lỗi trong quá trình tạo tài khoản vip', ['mysql' => $this->_sql->error]);
                  }
                }else{
                  $this->_return($return, false, 'Có lỗi trong quá trình thanh toán', ['mysql' => $this->_sql->error]);
                }
              }else{
                $this->_return($return, false, 'Tài khoản không đủ tiền');
              }
            }else{
              $this->_return($return, false, 'VIP này đã tồn tại !!!');
            }
          }
        }else{
          $this->_return($return, false, 'User is not existed yet !!');
        }
    }else{
        $this->_return($return, false, 'Số lượng của server đã quá giới hạn . Liên Hệ Admin Để Chuyển Tiền Qua Server Mới ');
    }
    return $return;
  }
  /*Gia Hạn VIP*/
  public function _renewVIP(&$userINFO, $vipID, $month = 1){
    $this->_checkCooperatorExpire($return, $userINFO);
    $this->_getSystemConfig();
    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
    if($check->num_rows > 0){
      $userINFO = $check->fetch_object();
      $checkVIP = $this->_sql->query('SELECT * FROM `vip` WHERE `id` = "'.(int) $vipID.'" AND `owned_by` = "'.(int) $userINFO->id.'"');
      if($checkVIP->num_rows > 0){
        $cVIP = $checkVIP->fetch_object();
        //$return['month'] = $month;
        if(strtotime($cVIP->expire) > time()){
          $newExpire = strtotime('+'.intval($month).' month', strtotime($cVIP->expire));
        }else{
          $newExpire = strtotime('+'.intval($month).' month');
        }
        $cost = ($cVIP->vip_type == 1) ? $this->_config->prices->costperLike : $this->_config->prices->costperCMT;
        $price = ($cVIP->amount_limit*$cost)*$month;
        if($userINFO->balance >= $price){
          if($userINFO->user_type == 1){
            $price = $price - ($price*$this->_config->prices->cooperated_discount)/100;
          }
          $update = $this->_sql->query('UPDATE `users` SET `balance` = `balance` - '.(int) $price.' WHERE `id` = "'.(int) $userINFO->id.'"');
          if($this->_sql->errno == 0 && $this->_sql->affected_rows > 0){
            $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.(int) $userINFO->id.'", "-'.(int) $price.'", "Gia hạn vip '.(int) $cVIP->amount_limit.' LIKE cho fbid '.addslashes($cVIP->fbid).'", 1)');
            $updateVIP = $this->_sql->query('UPDATE `vip` SET `expire` = "'.date('Y-m-d', $newExpire).'" WHERE `id` = "'.(int) $vipID.'"');
            if($this->_sql->errno == 0 && $this->_sql->affected_rows > 0){
              $this->_return($return, true, "Gia hạn thành công vipID #$vipID");
            }else{
              if($this->_sql->errno == 0){
                $this->_return($return, true, 'SAVED');
              }else{
                $this->_return($return, false, 'Xảy ra lỗi trong quá trình gia hạn, vui lòng liên hệ admin');
              }
            }
          }else{
            if($this->_sql->errno == 0){
              $this->_return($return, true, 'SAVED');
            }else{
              $this->_return($return, false, 'Xảy ra lỗi trong quá trình thanh toán để gia hạn vip');
            }
          }
        }else{
          $this->_return($return, false, 'Tài khoản không đủ tiền để gia hạn vip');
        }
      }else{
        $this->_return($return, false, 'VIP ID này không tồn tại hoặc bạn không sở hữu VIP ID này !! ');
      }
    }else{
      $this->_return($return, false, 'User này không tồn tại');
    }
    return $return;
  }
  /*xóa VIP*/
  public function _removeVIP($userINFO, $vipID)
  {
    $this->_getSystemConfig();
    $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
    if($check->num_rows > 0){
      $checkVIP = $this->_sql->query('SELECT * FROM `vip` WHERE `id` = "'.(int) $vipID.'"');
      if($checkVIP->num_rows > 0){
        $cVIP = $checkVIP->fetch_object();
        if($cVIP->owned_by != $userINFO->username){
          $this->_return($return, false, 'Bạn không sở hữu vip này !!');
        }else{

            $goi= $cVIP->goi;
            $cVIP->expire <= time() ? $cost = 0: $cost = (($cVIP->expire - time())/86400) * $this->_config->goi->$goi ;


          if($cost > 0 && $cVIP->expire > time()){
            $reFundS = $this->_sql->query('UPDATE `users` SET `balance` = `balance` + '.(int) $cost.' WHERE `id` = "'.(int) $userINFO->id.'"');
          }
          if($this->_sql->errno == 0){
              $remove = $this->_sql->query('DELETE FROM `vip` WHERE `id` = "'.(int) $vipID.'"');
              if($this->_sql->errno == 0){
                $this->_return($return, true, 'XÓA UID THÀNH CÔNG !!! '.".".'BẠN ĐƯỢC HOÀN TRẢ '.number_format($cost).' XU',[],"./vip.php");
              }else{
                $this->_return($return, false, 'Có lỗi bất ngờ trong quá trình xóa VIP, liên hệ ADMIN', ['mysql' => $this->_sql->error],"./vip.php");
              }
          }else{
              $this->_return($return, false, 'Có lỗi bất ngờ trong quá trình xóa VIP, liên hệ ADMIN', ['mysql' => $this->_sql->error],"./vip.php");
          }
        }
      }else{
        $this->_return($return, false, 'VIP không tồn tại !!',[],"./vip.php");
      }
    }else{
      $this->_return($return, false, 'USER không tồn tại !!',[],"./vip.php");
    }
    return $return;
  }

  public function _CooperatorStats($userINFO = array()){
    $query = $this->_sql->query('SELECT `id`, `username`, (SELECT COUNT(`id`) FROM `vip` WHERE vip.owned_by = users.id AND users.user_type = 1) AS total_vip, (SELECT COUNT(`id`) FROM `bot` WHERE bot.owned_by = users.id AND users.user_type = 1) AS total_bot FROM `users` WHERE `user_type` = 1 ORDER BY (total_vip + total_bot) DESC LIMIT 10');
    $data = [];
    $data['vipStats'] = [];
    $data['bestCooperator'] = [];
    $data['myStats'] = [];
  //  $data['myStats']
    if($query->num_rows > 0){
      while($v = $query->fetch_object()){
        $data['vipStats'][] = $v;
        if(isset($userINFO->id)){
          if($v->id == $userINFO->id){
            $data['myStats'] = $v;
          }
        }
      }
      $data['bestCooperator'] = $data['vipStats'][0];
    }
    $this->_return($return, true, 'DATA', ["data" => $data]);
    return $return;
  }
  public function _editListMsgVIP(&$userINFO, $vipID, $newList){
    $c = $this->_sql->query('SELECT * FROM `vip` WHERE `id` = "'.(int) $vipID.'" AND `owned_by` = "'.$userINFO->id.'"');
    if($c->num_rows > 0){
      $update = $this->_sql->query('UPDATE `vip` SET `list_comments` = "'.addslashes(json_encode($newList)).'" WHERE `id` = "'.(int) $vipID.'"');
      if($this->_sql->errno == 0){
        $this->_return($return, true, 'SAVED !!!');;
      }else{
        $this->_return($return, false, 'UNEXPECTED ERROR', ['mysql' => $this->_sql->error]);
      }
    }else{
      $this->_return($return, false, 'Bạn không sỡ hữu VIP này !!');
    }
    return $return;
  }
  public function _logout(&$userINFO){
    $u = $this->_sql->query('UPDATE `login_status` SET `status` = 0 WHERE `user_id` = "'.(int) $userINFO->id.'"');
    $this->_return($return, true, 'Logout !!');
    unset($userINFO);
    return $return;
  }

  public function _STARTUNFRIEND($userINFO, $token, $uD = array(), $max = 0){
    $this->_getSystemConfig();
    $price = $this->_config->prices->unfriend_fee;
    $cToken = $this->_fbgraph($token);
    if(!isset($cToken->error)){
        $check = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userINFO->id.'"');
        if($check->num_rows > 0){
            $fetch = $check->fetch_object();
            if((int) $fetch->balance >= (int) $price){
                if(count($uD) > 0){
                    $pay = $this->_sql->query('UPDATE `users` SET `balance` = `balance` - '.(int) $price.' WHERE `id` = "'.(int) $userINFO->id.'"');
                    if($this->_sql->errno == 0){
                        $this->_sql->query('INSERT INTO `paylogs`(`user_id`, `amount`, `content`, `status`) VALUES("'.(int) $userINFO->id.'", "-'.(int) $price.'", "phí xóa bạn bè cho FBID '.addslashes($cToken->id).'", 1)');
                        $unfs = [];
                        $success = 0;
                        foreach($uD as $f){
                            //print "id: ".substr(md5(time()), 0, 8). PHP_EOL;
                            //print "event: ping". PHP_EOL;
                            $unfriend = $this->_fbgraph($token, 'me/friends/'.trim($f), array('method' => 'DELETE'));
                            if(!isset($unfriend->error)){
                                $msg = ['fbid' => $f, 'msg' => "ĐÃ HỦY", 'success' => true];
                                ++$success;
                            }else{
                                $msg = ['fbid' => $f, 'msg' => $unfriend->error->message, 'error' => true];
                            }
                            print json_encode($msg).PHP_EOL;
                            $unfs[] = $msg;
                            ob_flush();
                            flush();
                            if($max > 0 && $success >= $max){
                                break;
                            }
                            sleep(1);
                        }
                        $this->_return($return, true, 'DONE, Bấm "XUẤT KẾT QUẢ" để xem các UID đã unfriend', ['data' => $unfs]);
                    }else{
                        $this->_return($return, false, 'CÓ LỖI TRONG QUÁ TRÌNH THANH TOÁN DỊCH VỤ, VUI LÒNG THỬ LẠI', ['mysql' => $this->_sql->error]);
                    }
                }else{
                    $this->_return($return, false, 'BẠN KHÔNG LỌC ĐƯỢC USER NÀO !!');
                }
            }else{
                $this->_return($return, false, 'Tài khoản không đủ tiền để sử dụng tính năng');
            }
        }else{
            $this->_return($return, false, 'Tài khoản không tồn tại');
        }
    }else{
        $this->_return($return, false, 'Token đã hết hạn');
    }
    return $return;
  }
}
