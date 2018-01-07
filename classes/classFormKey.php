<?php  
/***************************************************/
// Form key class. 
// Author: Faysal Ahmed
// baqi docs kisi aur din likhengay	
/***************************************************/
class FormKey  {  
   private $formKey;  
   public function generateKey(){  
		$ip = $_SERVER['REMOTE_ADDR'];  
		$uniqid = uniqid(mt_rand(), true);  
		return md5($ip . $uniqid);   
    }  
	
	function __construct(){  
		
	}  
	
	public function validate($sessionKey, $key){  
		if($sessionKey === $key){  
			return true;  
		}else{  
			return false;  
		}  
	}
	public function destoryFormKey($sName){
		if(isset($_SESSION[$sName])){
			unset($_SESSION[$sName]);
		}
	}
}  
?>