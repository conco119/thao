<?php
class ADMIN extends SERVER{
  public function _createUser($uname = '', $pwd = '', $month = 1, $balance = 0){
    $encrypt = $pwd;
    $check = $this->_sql->query('SELECT * FROM `users` WHERE `username` = "'.addslashes($uname).'"');
    if($check->num_rows > 0){
      $this->_return($return, false, 'This user was existed !!');
    }else{
        $insert = $this->_sql->query('INSERT INTO `users` (`username`, `password`, `user_type`, `cooperator_expire`, `balance`) VALUES("'.addslashes($uname).'", "'.addslashes($encrypt).'", 1, "'.addslashes(date('Y-m-d', strtotime('+'.(int) $month.' month'))).'", "'.(int) $balance.'")');
        if($this->_sql->errno == 0){
          $this->_return($return, true, 'Success');
        }else{
          $this->_return($return, false, 'Unexpected error !!!');
        }
    }
    return $return;
  }
  public function _getAllUser(){
    $c = $this->_sql->query('SELECT * FROM `users` WHERE `id` !=1');
    $data = [];
    if($c->num_rows > 0){
      while($r = $c->fetch_object()){

        unset($r->fbid);
        unset($r->activated);
        unset($r->user_type);
        $r->username = utf8_encode($r->username);
        $r->balance = (int) $r->balance;
        $data[] = $r;
      }
    }

    return ["data" => $data];
  }
  public function _getAllVIP(){
    $c = $this->_sql->query('SELECT * FROM `vip`');
    $data = [];
    if($c->num_rows > 0){
      while($r = $c->fetch_object()){
        unset($r->name);
        unset($r->type);
        unset($r->speed);
        unset($r->daily);
        unset($r->date_imported);
        $r->last_act = 	date('H:i d/m',$r->last_act);
        $r->expire = 	date('H:i d/m',$r->expire);
        $data[] = $r;
      }
    }
    return ["data" => $data];
  }
  public function _getAlllog(){
    $c = $this->_sql->query('SELECT * FROM `paylogs` ORDER BY `date_log` DESC');
    $data = [];
    if($c->num_rows > 0){
      while($r = $c->fetch_object()){
        unset($r->id);
        unset($r->status);
        $data[] = $r;
      }
    }

    return ["data" => $data];
  }
  public function _getAllATM(){
    $c = $this->_sql->query('SELECT * FROM `ATM` ORDER BY `thoigian` DESC');
    $data = [];
    if($c->num_rows > 0){
      while($r = $c->fetch_object()){
        unset($r->id);
        $r->thoigian = 	date('H:i d/m',$r->thoigian);
        $data[] = $r;
      }
    }

    return ["data" => $data];
  }
  public function _gettop(){
    $c = $this->_sql->query('SELECT * FROM `users` ORDER BY `balance` DESC');
    $data = [];
    if($c->num_rows > 0){
      while($r = $c->fetch_object()){
        unset($r->password);
        $data[] = $r;
      }
    }
    $this->_return($return, true, 'DATA', ["data" => $data]);
    return $return;
  }
  public function _getPaylogs(){
    $c = $this->_sql->query('SELECT *, (SELECT `username` FROM `users` WHERE users.id = paylogs.user_id) AS username FROM `paylogs` ORDER BY `date_log` DESC');
    $data = [];
    if($c->num_rows > 0){
      while($r = $c->fetch_object()){
        unset($r->password);
        $data[] = $r;
      }
    }
    $this->_return($return, true, 'DATA', ["data" => $data]);
    return $return;
  }
  public function _congtien($user, $money){
      $money = addslashes($money);
    $cExists = $this->_sql->query('SELECT * FROM `users` WHERE `username` = "'.addslashes($user).'"');

    if($cExists->num_rows > 0){
        $update = $this->_sql->query('UPDATE `users` SET `balance` = `balance` + '.(int) $money.' WHERE `username` = "'.addslashes($user).'"');
        if($this->_sql->errno == 0){
          $this->_return($return, true, 'Đã cộng '.number_format((int) $money).' đ cho tài khoản '.addslashes($user));
        }else{
          $this->_return($return, false, 'có lỗi bất ngờ trong lúc cộng tiền', ['mysql' => $this->_sql->error]);
        }
      }else{
         $this->_return($return, true, 'Không tồn tại user này '.addslashes($user));
      }
    return $return;
  }
  public function _congtien2($user, $money){
      $money = addslashes($money);
    $cExists = $this->_sql->query('SELECT * FROM `users` WHERE `username` = "'.addslashes($user).'"');

    if($cExists->num_rows > 0){
        $update = $this->_sql->query('UPDATE `users` SET `lstream_balance` = `lstream_balance` + '.(int) $money.' WHERE `username` = "'.addslashes($user).'"');
        if($this->_sql->errno == 0){
          $this->_return($return, true, 'Đã cộng '.number_format((int) $money).' đ cho tài khoản '.addslashes($user));
        }else{
          $this->_return($return, false, 'có lỗi bất ngờ trong lúc cộng tiền', ['mysql' => $this->_sql->error]);
        }
      }else{
         $this->_return($return, true, 'Không tồn tại user này '.addslashes($user));
      }
    return $return;
  }
  public function _adminStats(){
    $c = $this->_sql->query('SELECT COUNT(*) AS total_user,
    (SELECT COUNT(`id`) FROM `vip` WHERE `expire` > '.time().') AS total_vipactive,
    (SELECT COUNT(`id`) FROM `vip` WHERE `expire` <= '.time().') AS total_vipinactive,
    (SELECT SUM(`cash`) FROM `ATM`) AS thunhap FROM `users`');
    $this->_return($return, true, 'STATSADMIN', ["data" => $c->fetch_object()]);
    return $return;
  }
  public function _insertToken($token){
    $check = $this->_fbgraph($token, 'me', array('fields' => 'name,id,gender'));
    if(isset($check->error)){
      $this->_return($return, false, $check->error->message);
    }else{
      $cExists = $this->_sql->query('SELECT * FROM `tokens` WHERE `fbid` = "'.addslashes($check->id).'"');
      if($cExists->num_rows > 0){
        $update = $this->_sql->query('UPDATE `tokens` SET `token` = "'.addslashes($token).'" WHERE `fbid` = "'.addslashes($check->id).'"');
        if($this->_sql->errno == 0){
          $this->_return($return, true, 'Đã cập nhật token '.$check->id);
        }else{
          $this->_return($return, false, 'có lỗi bất ngờ trong lúc cập nhật token', ['mysql' => $this->_sql->error]);
        }
      }else{
        $insert = $this->_sql->query('INSERT INTO `tokens` (`fbid`, `gender`, `token`) VALUES("'.addslashes($check->id).'", "'.addslashes($check->gender).'", "'.addslashes($token).'")');
        if($this->_sql->errno == 0){
          $this->_return($return, true, 'Đã thêm token '.$check->id);
        }else{
          $this->_return($return, false, 'có lỗi bất ngờ trong lúc thêm token', ['mysql' => $this->_sql->error]);
        }
      }
    }
    return $return;
  }
  public function _getConfigs(){
    $c = $this->_sql->query('SELECT * FROM `system_configs`');
    $p = $this->_sql->query('SELECT * FROM `system_prices`');
    $this->_return($return, true, 'DATA CONFIG', ['config' => array_map('intval', (array)$c->fetch_object()), 'prices' => array_map('intval', (array)$p->fetch_object()),]);
    return $return;
  }
  public function _setConfig($c = array('cmtPerTime' => 5, 'likePerTime' => 50, "activated_mode" => 0)){
    $f = [];
    foreach($c as $key => $value){
      $f[] = "`$key` = '".intval($value)."'";
    }
    $s = implode(', ', $f);
    $this->_sql->query('UPDATE `system_configs` SET '.$s.' WHERE 1');
    $this->_return($return, true, 'SAVED');
    return $return;
  }
  public function _setPrices($p = array('costPerLike' => 50,'costperCMT' => 70, 'bot_like' => 50000, 'bot_cmt' => 50000, 'bot_react' => 50000, 'card_discount' => 0 /*%*/, 'cooperated_discount' => 20 /*%: Chiết khấu CTV*/, 'cooperator_fee' => 100000)){
    $f = [];
    foreach($p as $key => $value){
      $f[] = "`$key` = '".intval($value)."'";
    }
    $s = implode(', ', $f);
    $this->_sql->query('UPDATE `system_prices` SET '.$s.' WHERE 1');
    $this->_return($return, true, 'SAVED');
    return $return;
  }
  public function _removeVIP($vID){
    $c = $this->_sql->query('SELECT * FROM `vip` WHERE `id` = "'.(int) $vID.'"');
    if($c->num_rows > 0){
      $remove = $this->_sql->query('DELETE FROM `vip` WHERE `id` = "'.(int) $vID.'"');
      $this->_return($return, true, 'REMOVED !!');
    }else{
      $this->_return($return, false, 'VIP không tồn tại hoặc đã bị xóa trước đó !!');
    }
    return $return;
  }
  public function _removeBOT($bID){
    $c = $this->_sql->query('SELECT * FROM `bot` WHERE `id` = "'.(int) $bID.'"');
    if($c->num_rows > 0){
      $remove = $this->_sql->query('DELETE FROM `bot` WHERE `id` = "'.(int) $bID.'"');
      $this->_return($return, true, 'REMOVED !!');
    }else{
      $this->_return($return, false, 'BOT không tồn tại hoặc đã bị xóa trước đó !!');
    }
    return $return;
  }
  public function _removeUser($userID){
    $c = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userID.'"');
    if($c->num_rows > 0){
      $remove = $this->_sql->query('DELETE FROM `users` WHERE `id` = "'.(int) $userID.'"');
      $this->_return($return, true, 'REMOVED !!');
    }else{
      $this->_return($return, false, 'USER không tồn tại hoặc đã bị xóa trước đó !!');
    }
    return $return;
  }
  public function _setCooperator($userID, $date = "1970-01-01"/*Y-m-d*/){
    $c = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userID.'"');
    if($c->num_rows > 0){
      $update = $this->_sql->query('UPDATE `users` SET `user_type` = 1, `cooperator_expire` = "'.addslashes($date).'" WHERE `id` = "'.(int) $userID.'"');
      $this->_return($return, true, 'UPDATE Success !!');
    }else{
      $this->_return($return, false, 'USER không tồn tại hoặc đã bị xóa trước đó !!');
    }
    return $return;
  }
  public function _setpass($userID, $newpass){
    $c = $this->_sql->query('SELECT * FROM `users` WHERE `id` = "'.(int) $userID.'"');
    if($c->num_rows > 0){
      $update = $this->_sql->query('UPDATE `users` SET `password` = "'.addslashes($newpass).'" WHERE `id` = "'.(int) $userID.'"');
      $this->_return($return, true, 'Đổi pass thành công sang '.addslashes($newpass));
    }else{
      $this->_return($return, false, 'USER không tồn tại hoặc đã bị xóa trước đó !!');
    }
    return $return;
  }
  public function removeMaintain($server, $goi, $id)
  {
      // $maintain = $this->_sql->query('SELECT * FROM `maintenance` WHERE `id` = "'.(int) $id.'"');
      $this->_sql->query('DELETE FROM `maintenance` WHERE `id` = "'.(int) $id.'"');
      // $start_day = $maintain->fetch_object()->start_day;
      // $add_day = time() - $start_day;
      // var_dump($add_day);
      // $sql = "SELECT * FROM  `vip` WHERE `goi` = $goi AND `sever` = '{$server}'";
      // $vips = $this->_sql->query($sql);
      // if($vips->num_rows > 0)
      // {
      //   while($r = $vips->fetch_object())
      //   {
      //     if((int)$r->expire >= (int)$start_day)
      //     {
      //         // var_dump($r->expire, $start_day);
      //         $total_day = (int)$r->expire + (int)$add_day;
      //         $sql = "UPDATE `vip` SET `expire` = $total_day WHERE `id` = $r->id ";
      //         $this->_sql->query($sql);
      //     }

      //   }
      // }
  }
}
