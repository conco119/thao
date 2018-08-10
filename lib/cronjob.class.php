<?php
class CRONJOB extends SERVER{
	public function _getSystemConfig(){
    $config_c = $this->_sql->query('SELECT * FROM `system_configs` WHERE 1');
    $config = $config_c->fetch_object();
    $prices = $this->_sql->query('SELECT * FROM `system_prices` WHERE 1');
    $config->prices = $prices->fetch_object();
    $this->_arrconfig = array_merge($this->_arrconfig, (array)$config);
    $this->_reloadConfig();
    return $this->_config;
  }
	public function _checkToken(){
		$this->_getRandToken($tokens, 50);
		foreach($tokens as $token){
			$info = $this->_fbgraph($token->token);
			if(isset($info->id))
				continue;
			$this->_sql->query('DELETE FROM `tokens` WHERE `fbid` = "'.addslashes($token->fbid).'"');
		}
		$this->SQLStop();
	}
	/*VIP*/
	public function _vipLike(){
		$this->_getSystemConfig();
		$get = $this->_sql->query('SELECT * FROM `vip` WHERE UNIX_TIMESTAMP(`expire`) > UNIX_TIMESTAMP(NOW()) AND `vip_type` = 1 ORDER BY RAND() LIMIT 100');
		if($get->num_rows > 0){
			$vip = [];
			while($v = $get->fetch_object()){
				$this->_getRandToken($tokens, (int)$this->_config->likePerTime + 20);
				$success = 0;
				foreach($tokens as $token){
					$check = $this->_fbgraph($token->token);
					if(isset($check->error)) continue;
					$getWall = $this->_fbgraph($token->token, $v->fbid.'/feed', array('fields' => 'likes.summary(true)', 'limit' => 1));
					if(isset($getWall->error) || (isset($getWall->data) && count($getWall->data) < 0)) continue;
					$newest = $getWall->data[0];
					$checkLog = $this->_sql->query('SELECT * FROM `vip_logs` WHERE `token_id` = "'.addslashes($check->id).'" AND `tid` = "'.addslashes($newest->id).'" AND `type` = 1');
					if($checkLog->num_rows > 0) continue;
					$count = $this->_sql->query('SELECT COUNT(*) AS like_count FROM `vip_logs` WHERE `tid` = "'.$newest->id.'" AND `type` = 1');
					$count = $count->fetch_object();
					$checkRange = file_get_contents('range_list.txt');
					if(preg_match('/1:'.$newest->id.':([0-9]+)/', $checkRange, $res)){
						$post_like = $res[1];
					}else{
						$start = (int)$v->amount_limit - 20;
						$start = ($start > 0 ? $start: (int)$v->amount_limit - 2);
						$post_like = rand($start > 0 ? $start : (int) $v->amount_limit, (int) $v->amount_limit);
						$fp = fopen('range_list.txt', 'a+');
						fwrite($fp, "1:".$newest->id.":".$post_like."\n");
						fclose($fp);
					}
					if((int)$count->like_count >= (int)$post_like) break;
					$like = $this->_fbgraph($token->token, $newest->id.'/likes', array('method' => 'POST'));
					if(isset($like->error)) continue;
					++$success;
					if($success >= $this->_config->likePerTime) break;
					$insert = $this->_sql->query('INSERT INTO `vip_logs` (`tid`, `token_id`, `type`) VALUES("'.addslashes($newest->id).'", "'.addslashes($check->id).'", 1)');
				}
			}
		}
		$this->SQLStop();
	}
	public function _vipCMT(){
		$this->_getSystemConfig();
		$get = $this->_sql->query('SELECT * FROM `vip` WHERE UNIX_TIMESTAMP(`expire`) > UNIX_TIMESTAMP(NOW()) AND UNIX_TIMESTAMP(NOW()) - `last_act` >= 60 AND `vip_type` = 2 ORDER BY RAND() LIMIT 100');
		if($get->num_rows > 0){
			$vip = [];
			while($v = $get->fetch_object()){
				$this->_getRandToken($tokens, $this->_config->cmtPerTime);
				foreach($tokens as $token){
					$check = $this->_fbgraph($token->token);
					if(isset($check->error)) continue;
					$getWall = $this->_fbgraph($token->token, $v->fbid.'/feed', array('fields' => 'comments.summary(true),id,name', 'limit' => 2));
					print_r($getWall);
					if(isset($getWall->error)) continue;
					$newest = $getWall->data[0];
					if(!isset($newest)) continue;
					
					$checkLog = $this->_sql->query('SELECT * FROM `vip_logs` WHERE `token_id` = "'.addslashes($check->id).'" AND `tid` = "'.addslashes($newest->id).'" AND `type` = 2');
					if($checkLog->num_rows > 0) continue;
					$count = $this->_sql->query('SELECT COUNT(*) as cmt_count FROM `vip_logs` WHERE `tid` = "'.$newest->id.'" AND `type` = 2');
					$count = $count->fetch_object();
					$checkRange = file_get_contents('range_list.txt');
					if(preg_match('/2:'.$newest->id.':([0-9]+)/', $checkRange, $res)){
						$post_cmt = $res[1];
					}else{
					    //$start = (int)$v->amount_limit - 20;
					    $start = (int)$v->amount_limit;
					    //$start = $start > 0 ? $start : (int)$v->amount_limit;
						$post_cmt = rand($start > 0 ? $start : (int) $v->amount_limit, (int) $v->amount_limit);
						$fp = fopen('range_list.txt', 'a+');
						fwrite($fp, "2:".$newest->id.":".$post_cmt."\n");
						fclose($fp);
					}
					if((int)$count->cmt_count >= (int)$post_cmt) break;

					$messages = json_decode($v->list_comments);
					$rand = array_rand($messages);

					$getLastCMT = $this->_sql->query('SELECT * FROM `vip_logs` WHERE `type` = 2 AND `tid` = "'.addslashes($newest->id).'" ORDER BY `date_exec` DESC');
					if($getLastCMT->num_rows > 0){
						$lastCMT = $getLastCMT->fetch_object();
						$lastCMT = $lastCMT->content;
						if($messages[$rand] == $lastCMT){
							++$rand;
						}
						if($rand >= count($messages)){
						    $rand = 0;
						}
					}
					$message = $messages[$rand];
					
					$cmt = $this->_fbgraph($token->token, $newest->id.'/comments', array('method' => 'POST', 'message' => $message));
					$fp = fopen('cmtLogs.txt', 'a+');fwrite($fp, json_encode(array('method' => 'POST', 'message' => $message)));fclose($fp);
					if(isset($cmt->error)) continue;
					$up = $this->_sql->query('UPDATE `vip` SET `last_act` = UNIX_TIMESTAMP(NOW()) WHERE `id` = "'.(int) $v->id.'"');
					$insert = $this->_sql->query('INSERT INTO `vip_logs` (`tid`, `token_id`, `type`, `content`) VALUES("'.addslashes($newest->id).'", "'.addslashes($check->id).'", 2, "'.addslashes($message).'")');
				}
			}
		}
		$this->SQLStop();
	}
	protected function _getRandToken(&$list, $limit = 10){
		$gender = [
			1 => 'male',
			2 => 'female'
		];
		$get = $this->_sql->query('SELECT * FROM `tokens` ORDER BY RAND() LIMIT '.((int) $limit).'');
		$tokens = [];
		while($token = $get->fetch_object()){
			$tokens[] = $token;
		}
		$list = $tokens;
		return $tokens;
	}
}
