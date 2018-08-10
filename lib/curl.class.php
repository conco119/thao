<?php
/**
***				SA Team (SAT-CODING)
***					Copyright(c) 2016 by SAT.
***				Author: SonicQ12
**/
class cURL{
	protected 	$_options,
				$_method,
				$_responseType,
				$_response,
				$_saveLog,
				$_sql, 
				$is_cron;
	public function __construct(){
		$this->_init();
		return $this;
	}
	public function _init(){
		$this->_method = 'GET';
		$this->_options = array(
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_USERAGENT => 'Opera/9.80 (Series 60; Opera Mini/6.5.27309/34.1445; U; en) Presto/2.8.119 Version/11.10',
			CURLOPT_FRESH_CONNECT => true,
			CURLOPT_FOLLOWLOCATION => true
		);
		$this->_responseType = 'text';
		$this->_saveLog = false;
		$this->is_cron = 0;
	}
	public function _setOpts($opts = array()){
		foreach($opts as $key => $value){
			$this->_options[constant('CURLOPT_'.strtoupper($key))] = $value;
		}
	}
	public function _LogEn($saveLog = false, $sql, $status = true){
		if($status){
			$this->_saveLog = $saveLog;
			$this->_sql = $sql;
		}
	}
	public function _isCron($cron = true){
		if($cron) $iscron = 1;
		else $iscron = 0;
		$this->is_cron = $iscron;
	}
	public function _setUA($ua){
		$this->_options[CURLOPT_USERAGENT] = $ua;
	}
	public function _setCookie($randCJAR = false, $textCookie = ''){
		$this->_options[CURLOPT_COOKIE] = $textCookie != ''? $textCookie : true;
		$cookieDir = str_replace('\\', '/', dirname(__FILE__)).'/../cookieTmp/';
		if(!file_exists($cookieDir)){
			if(is_writable(dirname(__FILE__))){
				mkdir($cookieDir, 0777);
				$htaccess = fopen($cookieDir.'.htaccess', 'w+');
				fwrite($htaccess, base64_decode("PGZpbGVzIGluZGV4LnBocD4NCmRlbnkgZnJvbSBhbGwNCjwvZmlsZXM+"));
				fclose($htaccess);
			}else{
				die('This dir is unwritable');
			}
		}
		if(!$randCJAR){
			$cookieFile = $cookieDir.'cookie.txt';
		}else{
			$cookieFile = $cookieDir.md5(base64_encode($randCJAR));
		}
		$this->_options[CURLOPT_COOKIEFILE] = $cookieFile;
		$this->_options[CURLOPT_COOKIEJAR] = $cookieFile;
	}
	public function _setMethod($method){
		$this->_method = strtoupper($method);
	}
	public function _setResponse($responseType){
		$this->_responseType = $responseType;
	}
	public function _sendRequest($url, $dataArray = false){
		if($dataArray && $this->_method == 'GET'){
			$url .= '?'.(is_array($dataArray)?http_build_query($dataArray):$dataArray);
		}else if($dataArray && $this->_method == 'POST'){
			$this->_options[CURLOPT_POST] = true;
			$this->_options[CURLOPT_POSTFIELDS] = $dataArray;
		}
		$c = curl_init();
		$this->_options[CURLOPT_URL] = $url;
		curl_setopt_array($c, $this->_options);
		$return = curl_exec($c);
		curl_close($c);
		//print $return;
		if($this->_saveLog){
			$this->_sql->query('INSERT INTO `'.$this->_saveLog->table.'`(`url`, `postArray`, `response`, `is_cron`) VALUES("'.addslashes($url).'", "'.addslashes(is_array($dataArray)?http_build_query($dataArray):$dataArray).'", "'.addslashes($return).'", "'.$this->is_cron.'")');
		}
		switch($this->_responseType){
			default:
				$response = $return;
			break;
			case 'json':
			case 'jsonp':
				$response = json_decode($return);
			break;
			case 'parseString':
			case 'array':
				parse_str($return, $response);
			break;
		}
		
		return $this->_response = $response;
	}
}
