<?php 

class EnseignantController extends UserController{

	static $questionnaires;

	public function __construct($request){
		parent::__construct($request);
			//ValidateQuestionnaire
		if(isset($_POST['titreQuestaire'])){
			$this->methodName = "validateQuestionnaire";
		}

		self::$questionnaires = Questionnaire::getQuestionnairesByUserId($this->user->id());
	}

	public function questionnairesAction($request){
		$view = new UserView($this, 'questionnaires', array('user' => $this->user, 'questionnaires' => self::$questionnaires));
		$view->render();
	}
	public function nouveauQuestionnaireAction($request){
		$view = new UserView($this, 'nouveauQuestionnaire', array('user' => $this->user));
		$view->render();
	}

	public function validateQuestionnaire($request){
			$titreQ = $request->readPost('titreQuestaire');
			$descriptionQ = $request->readPost('descripQuestaire');
			$dateO = $request->readPost('date_ouverture');
			$heureO = $request->readPost('time_ouverture');
			$dateF = $request->readPost('date_fermeture');
			$heureF = $request->readPost('time_fermeture');
			$questionnaire = Questionnaire::create($titreQ, $descriptionQ, $dateO, $heureO, $dateF,$heureF, $consigne="1");
			// if(!$questionnaire) {
			// 	$view = new UserView($this,'nouveauQuestionnaire');
			// 	$view->setArg('questaireErrorText', 'Impossible de finaliser la création du questionnaire');
			// 	$view->render();
			// } else {
			$view = new UserView($this, 'userBienvenue', array('user' => $this->user));
			$view->render();
			// }
		}




}


?>