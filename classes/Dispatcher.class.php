<?php 

class Dispatcher{

	public static function dispatch($request){
		$controller = Request::getController();
		$class = ucfirst($controller).'Controller';
		//echo 'Dispatcher '.$class.'<br>';
		return new $class($request);
	}
}

?>