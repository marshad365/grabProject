<?php 
class sessionManager {
	public static $sessionArray = array();
	
	function __construct(){
		session_start();
	}
	
	public function createSession($sName, $sData){
		$_SESSION[$sName] = $sData;
		array_push( self::$sessionArray, $sName );
	}
	public function isSessionExists($sName){
		if(isset($_SESSION[$sName]))
			return true;
		else 
			return false;
	}
	public function getSessionData($sName){
		if (isset($_SESSION[$sName])){
			return $_SESSION[$sName];
		}else {
			return false;
		}
	}
	public function destroyAllSessions(){
		if(session_destroy()){ // Destroying All Sessions
			return true;
		}else{
			return false;
		}
	}
	
	public function destroySession($sName){
		if(isset($_SESSION[$sName])){
			unset($_SESSION[$sName]);
			return true;
		}else{
			return false;
		}
	}
	
	public function updateSession($sName,$newData){
		if (isset($_SESSION[$sName])){
			unset($_SESSION[$sName]);
			return $_SESSION[$sName] = $newData;
		}else {
			return false;
		}
	}
}


?>