<?php

class UserController extends Controller{
	
	protected $user;

	public function __construct($request){
		parent::__construct($request);
		session_start();

		$userId = NULL;
		if((Request::has('userId')))
			$userId = $request->readGet('userId');
		if(!is_null($userId)){
			$this->user = User::getUserById($userId);
			echo "user is set <br>";
		}
	}

	public function defaultAction($request){
		$view = new UserView($this, 'userBienvenue', array('user' => $this->user ));
		$view->render();
	}

	public function afficherUserMenu($request){
		$view = new UserView($this, 'userMenu', array('user' => $this->user ));
		$view->render();
	}

	public function profilAction($request){
		$view = new UserView($this, 'userProfil', array('user' => $this->user ));
		$view->render();
	}

}

?>