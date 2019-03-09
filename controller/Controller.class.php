<?php

abstract class Controller{

	public function __construct($request){}

	abstract public function defaultAction($request);

	function execute(){
		$action = Request::getAction();
		echo "<br>fct execute (Action : ".$action.")<br>";
		$a = $action.'Action';
		$this::$a(Request::getCurrentRequest());
	}

}

?>