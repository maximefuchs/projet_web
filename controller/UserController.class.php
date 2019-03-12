<?php

class UserController extends Controller{

	protected $user;

	public function __construct($request){
		parent::__construct($request);
		session_start();
		$userId=$request->readGet('userId');
		if(isset($_SESSION['login']))
			$this->user = User::getUserById($userId);
		if(!is_null($userId)){
			$this->user = User::getUserById($userId);
			$_SESSION['login'] = $this->user['user_login'];
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
		echo $this->user;
		$view = new UserView($this, 'userProfil', array('user' => $this->user ));
		$view->render();
	}

}

?>
