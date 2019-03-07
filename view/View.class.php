<?php

class View {

	public $controller = NULL;
	public $content = NULL;
	
	public function __construct($controller){
		$this->controller = $controller;
	}

	function render(){
		require_once(__ROOT_DIR.'/templates/test.php');
	}
}

?>