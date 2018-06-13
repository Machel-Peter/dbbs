<?php
if (! defined('IN_DISCUZ')) {
	exit('Access Denied');
}
/**
* 读取配置文件和token校验
*/
C::import('HttpHelper', 'plugin/dxcaptcha/util');
class DxCaptcha
{
	private $appId;
	private $appSecret;
	private $dx_config = array ();

	public function __construct($appId, $appSecret)
	{
		$config = @include DISCUZ_ROOT . 'source/plugin/dxcaptcha/config/config.php';
		$this->dx_config = $config['dx_config'];

		if(empty($appId)){
			$this->appId = $this->dx_config['dx_captcha_appId'];
		} else {
			$this->appId = $appId;
		}
		$this->appSecret = ($appSecret == null)?'':$appSecret;
	}

	public function getCapcthaAppId(){
		return $this->appId;
	}
	
	public function getCaptchaUrl(){
		return $this->dx_config['dx_captcha_url'];
	}
	public function getValidTokenUrl(){
		return $this->dx_config['dx_valid_token_url'];
	}

	//token校验
	public function _validToken($token, $constId){
		if (is_null($this->appId) || is_null($token) || is_null($constId)) {
            return false;
        }
        $sign = md5($this->appSecret.$token.$this->appSecret);

		$httpHelper = new HttpHelper();
		$postData = array(
			'constId' => $constId,
			'token' => $token,
			'appKey' => $this->appId,
			'sign' => $sign
		);

		try{
			$httpResponse = $httpHelper->curl($this->dx_config['dx_valid_token_url']."?".$this->getRequestBody($postData), 'GET', null, null);
			$obj = json_decode($httpResponse);
			if($obj != null){
				return $obj->success;
			} 
			return false;
		}catch(Exception $e){
			print $e->getMessage();
			return false;
		}
	}

	public function getRequestBody($postFildes){		
		$content = "";
		foreach ($postFildes as $apiParamKey => $apiParamValue)
		{			
			$content .= "$apiParamKey=" . urlencode($apiParamValue) . "&";
		}
		return substr($content, 0, -1);
	}
}