<?php

class EnseignantController extends UserController{

	static $questionnaires;
	static $promos;

	public function __construct($request){
		parent::__construct($request);
			//ValidateQuestionnaire
		if(isset($_POST['titreQuestaire'])){
			$this->methodName = "validateQuestionnaire";
		}

		self::$questionnaires = Questionnaire::getQuestionnairesByUserId($this->user->id());
		self::$promos=User::getAllPromo();
	}

	public function questionnairesAction($request){
		$view = new UserView($this, 'questionnaires', array('user' => $this->user, 'questionnaires' => self::$questionnaires));
		$view->render();
	}
	public function nouveauQuestionnaireAction($request){
		$view = new UserView($this, 'nouveauQuestionnaire', array('user' => $this->user, 'promos'=>self::$promos));
		$view->render();
	}

	public function validateQuestionnaire($request){
		$titreQ = $request->readPost('titreQuestaire');
		$descriptionQ = $request->readPost('descripQuestaire');
		$dateO = $request->readPost('date_ouverture');
		$heureO = $request->readPost('time_ouverture');
		$dateF = $request->readPost('date_fermeture');
		$heureF = $request->readPost('time_fermeture');
			$consigne = 1; //ajout d'une selection d'une consigne à faire
			$userID = $this->user->id();
			$promo=$request->readPost('Promo');
			if($promo == "tous"){
				$questionnaire = Questionnaire::create($consigne, $userID, $titreQ, $descriptionQ, $dateO, $heureO, $dateF,$heureF,$promo=null,$groupe=null,$TD=null);
			} else {
				$tous=$request->readPost('tous');
				if($tous == 'on'){
					$questionnaire = Questionnaire::create($consigne, $userID, $titreQ, $descriptionQ, $dateO, $heureO, $dateF,$heureF,$promo,$groupe=null,$TD=null);
				} else {
					$groupeTD=$request->readPost('visibilite');
					if($groupeTD == "groupe"){
						$groupe=$request->readPost('groupe');
						$questionnaire = Questionnaire::create($consigne, $userID, $titreQ, $descriptionQ, $dateO, $heureO, $dateF,$heureF,$promo,$groupe,$TD=null);
					} else {
						$TD=$request->readPost('td');
						$questionnaire = Questionnaire::create($consigne, $userID, $titreQ, $descriptionQ, $dateO, $heureO, $dateF,$heureF,$promo,$groupe=null,$TD);
					}
				}
			}

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
