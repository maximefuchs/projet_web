<?php

class UserController extends Controller{
	
	protected $user;

	public function __construct($request){
		parent::__construct($request);
		session_start();

		$userId = NULL;
		if((Request::has('user')))
			$userId = $request->read('user');
		if(!is_null($userId))
			$this->user = User::getUserById($userId);
	}

	public function defaultAction($request){
		$view = new UserView($this, 'userBienvenue');
		$view->render();
	}

	public function afficherUserMenu($request){
		$view = new UserView($this, 'userMenu');
		$view->render();
	}

	public function profilAction($request){
		$view = new UserView($this, 'userProfil');
		$view->render();
	}

}

?>