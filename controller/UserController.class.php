<?php

class UserController extends Controller{

	public function __construct($request){
		$this::afficherUserMenu($request);
	}

	public function defaultAction($request){
		$view = new UserView($this);
		$view->render();
	}

	public function afficherUserMenu($request){
		 $view = new UserView($this);
		 $view->renderUserMenu();
	}

}

?>