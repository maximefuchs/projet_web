<?php

class Dispatcher{

	public static function dispatch($request){
		$controller = $request->getController();
		$class = ucfirst($controller).'Controller';
		return new $class($request);
	}
}

?>
