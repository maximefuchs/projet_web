<?php

class UserController extends Controller{

	protected $user;

	public function __construct($request){
		parent::__construct($request);
		session_start();

		$userId = NULL;
		if(isset($_SESSION['user_id'])){
			$this->user = User::getUserById($_SESSION['user_id']);
		} else {
			$userId = $request->readGet('userId');
			$this->user = User::getUserById($userId);
			$_SESSION['user_id'] = $this->user['user_id'];
		}
	}

	public function defaultAction($request){
		$view = new UserView($this, 'userBienvenue', array('user' => $this->user));
		$view->render();
	}

	public function afficherUserMenu($request){
		$view = new UserView($this, 'userMenu', array('user' => $this->user));
		$view->render();
	}

	public function profilAction($request){
		$view = new UserView($this, 'userProfil', array('user' => $this->user ));
		$view->render();
	}

}

?>
