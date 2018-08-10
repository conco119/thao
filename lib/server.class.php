<?php
/**
***			Coded by SonicQ12
***				SonicQ12.Systems - SonicQ12.CEO. Copyright (c) 2016. SonicQ12
***					Website: SonicQ12.Systems - Facebook: Fb.Com/SonicQ12.VN
***/
abstract class SERVER{
	protected 	$_sql,
	        //    $_sqldaily,  
				$_config,
				$_cURL;
	public function __construct($config = array()){
		if($config){
			$this->_config = $config;
		}
		$this->SQLStart();
		$this->_cURL = new cURL();
		$this->_cURL->_LogEn((object)array('table' => 'serverlogs'), $this->_sql);
		$this->_arrconfig = $this->_config;
		$this->_config = json_decode(json_encode($this->_config));
	}
	public function _reloadConfig(){
		$this->_config = json_decode(json_encode($this->_arrconfig));
	}
	protected function SQLStart(){
		if($this->_config['host'] == '' || $this->_config['user'] == '' || $this->_config['dbname'] == ''){
			die('HOST/USER/DBName is empty');
		}
		//if($this->_config['hostdaily'] == '' || $this->_config['userdaily'] == '' || $this->_config['dbnamedaily'] == ''){
		//	die('HOST/USER/DBName dai ly is empty');
		//}
		$this->_sql = new mysqli($this->_config['host'], $this->_config['user'], $this->_config['pass'], $this->_config['dbname']);
		//$this->_sqldaily = new mysqli($this->_config['hostdaily'], $this->_config['userdaily'], $this->_config['passdaily'], $this->_config['dbnamedaily']);
		if($this->_sql->connect_errno){
			die('<p>ERROR: <b>'.$this->_sql->connect_error.'</b></p>');
		}
	}
	public function SQLStop(){
	    $this->_sqldaily->close();
		return $this->_sql->close();
	}
	/**
	 *
	 *  @param [in] $token Facebook Access_Token
	 *  @param [in] $path GRAPH Api path
	 *  @param [in] $uri Data Fields
	 *  @return cURL Response
	 *
	 */
	public function _fbgraph($token, $path = 'me', $uri = array()){
		$uri['access_token'] = $token;
		$url = "https://graph.fb.me/$path";
		if(isset($uri)){
		$uri['method'] = isset($uri['method']) ? strtoupper($uri['method']) : 'GET';
		}
		//$this->_cURL->_setMethod($uri['method']);
		$this->_cURL->_setResponse('json');
		return $this->_cURL->_sendRequest($url, $uri);
	}
	public function _fbcurl($cookie = array('c_user' => '', 'xs' => ''), $path = 'profile.php', $subdomain = 'www', $method = 'GET', $fields = array(), $responseType = 'text'){
		$cookie = (object) $cookie;
		$cookie_build = 'c_user='.$cookie->c_user.'; xs='.$cookie->xs.';';
		$this->_cURL->_setResponse($responseType);
		$this->_cURL->_setMethod($method);
		$this->_cURL->_setCookie(json_encode($cookie), $cookie_build);
		return $this->_cURL->_sendRequest('https://'.$subdomain.'.facebook.com/'.trim($path), $fields);
	}
	/**
	 *
	 *  @param [in] $success success or error message
	 *  @param [in] $msg message
	 *  @return Return Message
	 *
	 */
	public function _return(&$return, $success = false, $msg, $details = array(),$urlhiih = "./"){
		//$return = array();
		if($success){
			$return['success'] = true;
			}else{
			$return['error'] = true;
		}
		$return['msg'] = $msg;
		foreach($details as $key => $value){
			$return[$key] = $value;
		}
	    $return['url'] = $urlhiih;
		return $return;
	}
}
