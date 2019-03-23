<?php 

class EtudiantController extends UserController{

	static $questionnaires; 

	public function __construct($request){
		parent::__construct($request);

		self::$questionnaires = Questionnaire::getQuestionnaireByEtudiant($this->user->promo(),$this->user->grp_demiPromo(),$this->user->td());
	}

	public function questionnairesAction($request){
		$view = new UserView($this, 'questionnaires', array('user' => $this->user, 'questionnaires' => self::$questionnaires));
		$view->render();
	}


}


?>