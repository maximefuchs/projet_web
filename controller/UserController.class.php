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
			//ValidateQuestionnaire
			if(isset($_POST['titreQuestaire'])){
				$this->methodName = "validateQuestionnaire";
			}
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

	public function questionnairesAction($request){
		self::$quest=Questionnaire::getQuestionnairesByUserId($this->user->id());
		$view = new UserView($this, 'questionnaires', array('user' => $this->user, 'questionnaires' => self::$quest));
		$view->render();
	}
	public function nouveauQuestionnaireAction($request){
		$view = new UserView($this, 'nouveauQuestionnaire', array('user' => $this->user));
		$view->render();
	}

	public function validateQuestionnaire($request){
			$titreQ = $request->readPost('titreQuestaire');
			$descriptionQ = $request->readPost('descripQuestaire');
			$dateO = $request->readPost('date_ouverture').' '.$request->readPost('time_ouverture');
			$dateF = $request->readPost('date_fermeture').' '.$request->readPost('time_fermeture');
			$etat=Questionnaire::defEtat($dateO,$dateF);
			if($etat == false) { //etat peut-être soit false soit une chaine de caractère
				$view = new UserView($this,'nouveauQuestionnaire',array('user' => $this->user));
				$view->setArg('dateErrorText', 'Date incohérente');
				$view->render();
			} else {
			$questionnaire = Questionnaire::create($titreQ, $descriptionQ, $dateO, $dateF, $consigne="1",$etat,$this->user->id());
			if(!$questionnaire) {
				$view = new UserView($this,'nouveauQuestionnaire',array('user' => $this->user));
				$view->setArg('questaireErrorText', 'Impossible de finaliser la création du questionnaire');
				$view->render();
			} else {
			$view = new UserView($this, 'userBienvenue', array('user' => $this->user));
			$view->render();
			}
		}
	}

}

?>
