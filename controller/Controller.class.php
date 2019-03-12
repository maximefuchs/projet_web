<?php

abstract class Controller extends MyObject{

	protected $request;
	protected $methodName;


	public function __construct($request){
		$this->request = $request;
		$this->methodName = (Request::getActionName()).'Action';
	}

	abstract public function defaultAction($request);

	function execute(){
		$m = $this->methodName;
		$this->$m($this->request);
	}


}

?>