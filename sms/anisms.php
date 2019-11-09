<?php
//=======================================	
	class webserviceAniSMS{
	
	private $client_object;
	public $username;
	public $password;
	public $isRead;
	public $from;
	public $to;
	public $Message;
	public $recId;
	public function __construct($wsdl){
		$this->client_object = new SoapClient($wsdl);
		$this->client_object->http_encoding='utf-8';
		$this->client_object->soap_defencoding = 'utf-8';
		$this->client_object->decode_utf8 = false;
		
	}
	public function GetInboxCount(){
		$result = 0;
		try {
		$result = $this->client_object->inboxlist($this->username,$this->password);
		return $result;
		} catch (SoapFault $fault) {
			return "$fault";
		}
	}
	public function GetCredit(){
		$result = 0;
		try {
			$result = $this->client_object->GetCredit($this->username,$this->password);
			if(is_array($result))
				$result = implode(":",$result);
			if(is_numeric($result))
				$result = number_format($result,0,'',',');
			return "اعتبار شما : ".$result;
		} catch (SoapFault $fault) {
			return "$fault";
		}
	}
	public function GetDelivery(){
		try {
		$result = $this->client_object->GetDelivery($this->username,$this->password,$this->recId);
		$payam=array(
			0 => "منتظر دریافت مخابرات",
			1 => "ارسال شده به مخابرات",
			2 => "رسیده به گوشی",
			8 => "منقضی شده",
			9 => "بلاک شده توسط مخابرات",
			-1 => "کد ارسالی اشتباه است"
		);
		return array($result,@$payam[$result]);
		} catch (SoapFault $fault) {
			return "$fault";
		}
	}
	public function SendSMS(){
		$Receptions = (array)$this->to;
		try {
			//If you want to send in the future  ==> $time = '2016-07-30' //$time = '2016-07-30 12:50:50'
			
			$time = '';
			
			$status = $this->client_object->SendSMS($this->from,$Receptions,$this->Message,$this->username,$this->password,$time,"send");
			return $status;
		} catch (SoapFault $ex) {
			return $ex->faultstring;
		}
	}
	}
//=======================================	
	class AniSMS{
	function LoadSmsPanelDorCab($mode,$sms_username,$sms_password,$sms_number,$sms_center,$sms_NO=NULL,$message=NULL){
		$Udh="";
		$options = array();
		if(!strlen($sms_username) || !strlen($sms_password) || !strlen($sms_number))
		{
			return " <strong>تنظیمات پیامک صحیح نیست</strong> ";
		}
		//error_reporting(0);
		try
		{
			$soapClientObj = new webserviceAniSMS($sms_center);
			$soapClientObj->username = $sms_username;
			$soapClientObj->password = $sms_password;
		switch($mode){
		case 'check':
			$res = $soapClientObj->GetCredit();
			if(empty($res)){
			return "<strong>عدم دسترسی به سرور آنی پیام</strong> ";
			}
			$_SESSION["AniSMScheck"] = 1;
			return $res;
		break;
		case 'inbox':
			$soapClientObj->isRead = 0;
			$res = $soapClientObj->GetInboxCount();
			return ((int)$res); 
		case 'send':
			$soapClientObj->from = $sms_number;
			$soapClientObj->to = $sms_NO;
			$soapClientObj->Message = $message;
			return $soapClientObj->SendSMS();
		break;
		case 'getdelivery':
			$soapClientObj->recId = $sms_NO;
			return $soapClientObj->GetDelivery();
		break;
		}
		}
		catch (SoapFault $sf)
		{
			return "<strong>عدم دسترسی به سرور آنی پیام : $sf->faultstring</strong> ";
		}
	}
	}
//=======================================	
?>