<?php

class EtudiantController extends UserController{

	public function __construct($request){
		parent::__construct($request);

		// if(isset($_POST['ValiderReponses'])){
		// 	$this->validerReponses($request);
		// }
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
			$explode = explode("_", $key);
			$type = $explode[0];


			// pour les questions de type différent de QCM on peut savoir directement si la question a été repondue juste dans son intégralité
			// pour un QCM, il faut récupérer tous les éléments, cochés ou non, pour savoir si l'élève a bien coché toutes les bonnes réponses
			$QCM = false;
			$repQCM= array();
			$nbQuestions;
			$compteur = 0;

			if($type == 'QCM'){
				$repQCM[$key] = $value;
				$compteur++;
				if($QCM){
					if($compteur == $nbQuestions){
						$r = $this->correctionQCM($repQCM);
						$compteur = 0;
						$repQCM = array();
						$QCM = false;
					}
				} else {
					$nbQuestions = explode(":",$explode[2])[1];
					$QCM = true;
				}

			} else { // si ce n'est pas un QCM, on va directement chercher la réponse
				$r = $this->correction($key, $value);
			}

		}

	}


	public function correctionQCM($reponses){

	}


	// retourne si la/les réponse(s) pour la question est/sont juste(s)
	// retourne id question
	// permettra l'insertion dans la table reponse choisie
	public function correction($key, $value){
		$explode = explode("_", $key);
		$type = $explode[0];

		$r = true;
		switch ($type) {

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
