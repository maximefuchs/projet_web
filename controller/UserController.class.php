<?php

class UserController extends Controller{

	protected $user;
	static $quest;

	public function __construct($request){
		parent::__construct($request);
		session_start();

		$userId = NULL;
		if(isset($_SESSION['ID_USER'])){
			$this->user = User::getUserById($_SESSION['ID_USER']);
			//var_dump($this->user);
		} else {
			$userId = $request->readGet('userId');
			$this->user = User::getUserById($userId);
			$_SESSION['ID_USER'] = $this->user->id();

		}
	}

	public function defaultAction($request){
		$view = new UserView($this, 'userBienvenue', array('user' => $this->user));
		$view->render();
	}

	public function profilAction($request){
		$view = new UserView($this, 'userProfil', array('user' => $this->user ));
		$view->render();
	}

	public function questionnaireAction($request){
		self::$quest=Questionnaire::getQuestionnairesByUserId($this->user->id());
		$view = new UserView($this, 'userQuestionnaires', array('user' => $this->user, 'questionnaires' => self::$quest));
		$view->render();
	}

}

?>
