<?php

class EtudiantController extends UserController{

	public function __construct($request){
		parent::__construct($request);
	}

	public function questionnairesAction($request){
		$view = new UserView($this, 'questionnaires', array('user' => $this->user, 'questionnaires' => getQuByEtudiant()));
		$view->render();
	}

	public function repondreQuestionnaireAction($request){
		$idQuestionnaire = $request->readGet('idQuestionnaire');
		$questions = Question::getQuestionsDeQuestionnaireId($idQuestionnaire);
		$reponses = Reponse::getReponseByIdQuestionnaire($idQuestionnaire));
		$view = new UserView($this, 'repondreQuestionnaire', 
			array('user' => $this->user, 
				'questions' => $questions, 
				'reponses' => $reponses
			));
		$view->render();
	}

	public function getQuByEtudiant(){
		return Questionnaire::getQuestionnaireByEtudiant($this->user->promo(),$this->user->grp_demiPromo(),$this->user->td());
	}



}


?>
