<?php 

class AjaxController extends Controller{

	static $types;

	public function __construct($request){
		parent::__construct($request);

		// self::$types = Question::getTypes();
		self::$types = array('QCM', 'QCU', 'ASSIGNE', 'LIBRE');
	}

	public function defaultAction($request){}

	public function questionNewAction($request){
		$num = $request->readGet('num');
		$view = new AjaxView($this, 'nouvelleQuestion', array('types'=> self::$types, 'num' => $num));
		$view->render();
	}

	public function helloAction($request){
		$view = new AjaxView($this, 'bienvenue');
		$view->render();
	}
}


 ?>