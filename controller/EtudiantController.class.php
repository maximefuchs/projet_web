<?php

class EtudiantController extends UserController{

	public function __construct($request){
		parent::__construct($request);

		if(isset($_GET['ValiderReponses'])){
			$this->validerReponses();
		}
	}

	public function questionnairesAction($request){
		$view = new UserView($this, 'questionnaires', array('user' => $this->user, 'questionnaires' => $this->getQuByEtudiant()));
		$view->render();
	}

	public function repondreQuestionnaireAction($request){
		$idQuestionnaire = $request->readGet('idQuestionnaire');
		$questions = Question::getQuestionsDeQuestionnaireId($idQuestionnaire);
		$reponses = Reponse::getReponseByIdQuestionnaire($idQuestionnaire);
		$view = new UserView($this, 'repondreQuestionnaire', 
			array('user' => $this->user, 
				'questions' => $questions, 
				'reponses' => $reponses,
				'idQu' => $idQuestionnaire
			));
		$view->render();
	}

	public function getQuByEtudiant(){
		return Questionnaire::getQuestionnaireByEtudiant($this->user->promo(),$this->user->grp_demiPromo(),$this->user->td());
	}

	public function validerReponses(){
		
	}



}


?>
