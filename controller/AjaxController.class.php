<?php 

class AjaxController extends Controller{

	public function __construct($request){
		parent::__construct($request);
	}

	public function defaultAction($request){}

	public function questionNewAction($request){
		$view = new AjaxView($this, 'nouvelleQuestion', array('type'=>Question::getTypes()));
		$view->render();
	}

	public function helloAction($request){
		$view = new AjaxView($this, 'bienvenue');
		$view->render();
	}
}


 ?>