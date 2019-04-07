<?php 

class AjaxController extends Controller{

	public function __construct($request){
		parent::__construct($request);
	}

	public function defaultAction($request){}

	public function questionNewAction($request){
		$num = $request->readGet('num');
		$view = new AjaxView($this, 'nouvelleQuestion', array('types'=>Question::getTypes(), 'num' => $num));
		$view->render();
	}

	public function helloAction($request){
		$view = new AjaxView($this, 'bienvenue');
		$view->render();
	}
}


 ?>