<?php 

class Request {

	protected static $request = NULL;

	public static function getCurrentRequest(){
		if(is_null(self::$request)){
				self::$request = new Request();
		}
		return self::$request;
	}

	static function getController(){
		if(isset($_GET['controller'])){
			return $_GET['controller'];
		} else {
			return 'Anonymous';
		}
	}

	static function getActionName(){
		if(isset($_GET['action'])){
			return $_GET['action'];
		} else {
			return 'default';
		}
	}

	function read($code){
		return $_POST[$code];
	}

	function write($code, $value){
		$_GET[$code] = $value;
	}

	static function has($code){
		return (isset($_GET[$code])||isset($_POST[$code]));
	}

}


?>