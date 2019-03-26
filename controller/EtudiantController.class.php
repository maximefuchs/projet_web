<?php

class EtudiantController extends UserController{

	public function __construct($request){
		parent::__construct($request);

		if(isset($_POST['ValiderReponses'])){
			$this->validerReponses($request);
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

	public function validerReponses($request){
		$QidsEtRidsAssociees = $_SESSION['QetR'];

// 
		// 
		// d'abord regrouper les reponses par question puis les traiter
		// 
// 
		foreach ($_POST as $key => $value) {
			$r = reponseChoisieEstJuste($key, $value);
		}

	}


	// retourne si la/les réponse(s) pour la question est/sont juste(s)
	// retourne id question
	// permettra l'insertion dans la table reponse choisie
	public function reponseChoisieEstJuste($key, $value){
		$explode = explode("_", $key);
		$type = $explode[0];

		$question = true;
		switch ($type) {

			case 'QCM':
			$idQu = explode(":", $explode[1])[1];
			$idR = explode(":", $explode[2])[1];
					// gérer les bonnes réponses non données
			$estJuste = explode(":", $explode[3])[1];
			if( ! ($estJuste == 1 && $value == 'on') ){
				$question = false;
			}
			break;

			case 'QCU':
					# code...
			break;

			case 'LIBRE':
					# code...
			break;

			case 'ASSIGNE':
					# code...
			break;
		}
	}



}


?>
