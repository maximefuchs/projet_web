<?php

abstract class Controller extends MyObject{

	protected $request;

	public function __construct($request){
		$this->request = $request;
	}

	abstract public function defaultAction($request);

	function execute(){
		$methodName = Request::getActionName();
		echo "<br>fct execute (Action : ".$methodName.")<br>";
		$methodName = $methodName.'Action';
		$this->$methodName($this->request);
	}


}

?>