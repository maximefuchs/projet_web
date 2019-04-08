<?php

class EnseignantController extends UserController{

	static $questionnaires;
	static $promos;
	static $types_question;

	public function __construct($request){
		parent::__construct($request);
		//ValidateQuestionnaire
		if(isset($_POST['titreQuestaire'])){
			$this->methodName = "validateQuestionnaire";
		}
		if(isset($_POST['TypeQuestion'])){
			$this->methodName = "validateQuestion";
		}


		self::$questionnaires = Questionnaire::getQuestionnairesByUserId($this->user->id());
		self::$promos=User::getAllPromo();
		self::$types_question=Question::getTypes();


		if(isset($_POST['addQuestions'])){
			$this->validateQuestions($request);
		}
	}

	public function questionnairesAction($request){
		$view = new UserView($this, 'questionnaires', array('user' => $this->user, 'questionnaires' => self::$questionnaires));
		$view->render();
	}
	public function nouveauQuestionnaireAction($request){
		$view = new UserView($this, 'nouveauQuestionnaire', array('user' => $this->user, 'promos'=>self::$promos));
		$view->render();
	}

	public function modifierQuestionnaireAction($request){
		$view = new UserView($this, 'todo', array('user' => $this->user));
		$view->render();
	}

	public function voirResultatsQuestionnaireAction($request){
		$resultats = User::getResultatsByQuestionnaire($request->readGet('idQuestionnaire'));
		$view = new UserView($this, 'notesQuestionnaire', 
			array('user' => $this->user, 
				'resultats' => $resultats));
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
		$idQuestionnaire = DatabasePDO::getPDO()->lastInsertId();
		$_SESSION['id_questionnaire']=$idQuestionnaire;
		// var_dump("questionnaireeeeeee=",self::$id_questaire);
		// if(!$questionnaire) {
		// 	$view = new UserView($this,'nouveauQuestionnaire');
		// 	$view->setArg('questaireErrorText', 'Impossible de finaliser la création du questionnaire');
		// 	$view->render();
		// } else {
		$view = new UserView($this, 'remplirQuestion', 
			array('user' => $this->user, 
				'types'=>self::$types_question,
				'idQuestionnaire' => $idQuestionnaire,
				'num' => 1));
		$view->render();
		// }
	}
//Inutile pour le moment...
	public function nouvelleQuestionAction($request){
		$view = new UserView($this, 'remplirQuestion', array('user' => $this->user));
		$view->render();
	}

	public function validateQuestion($request){
		$typeQ = $request->readPost('TypeQuestion');
		$descriptionQ = $request->readPost('descripQuestion');
		$tag = $request->readPost('Tag');
		$NbReponses = $request->readPost('NbrRep');
		// var_dump($typeQ,$descriptionQ,$tag);
		$consigne = 1; //ajout d'une selection d'une consigne à faire
		$question=Question::create($consigne, $tag, $typeQ,$NbReponses, $descriptionQ);
		// var_dump($question);
		$id_question=DatabasePDO::getPDO()->lastInsertId();
		Question::associerQuestionQuestionnaire($_SESSION['id_questionnaire'],$id_question);
		$view = new UserView($this, 'nouvelleQuestion', array('user' => $this->user, 'types'=>self::$types_question));
		$view->render();
		// }
	}

	public function validateQuestions($request){
		$idQuestionnaire = $request->readPost('idQuestionnaire');
		$num = 1;
		while (isset($_POST['TypeQuestion__'.$num])) {
			$type = $_POST['TypeQuestion__'.$num];
			$description = $_POST['descripQuestion__'.$num];
			$tag = $_POST['Tag__'.$num];
			$consigne = 1;

			$rep = $this->recuperReponse($num, $type);
			var_dump($rep);

			$NbReponses = $rep['NbReponses'];
			Question::create($consigne, $tag, $type, $NbReponses, $description);
			$id_question=DatabasePDO::getPDO()->lastInsertId();
			Question::associerQuestionQuestionnaire($idQuestionnaire, $id_question);

			$this->enregistrerReponses($id_question, $type, $rep);
			$num++;
		}
	}

	public function recuperReponse($num, $type){
		$rep = array();
		switch ($type) {
			case 'LIBRE':
			$contenu = $_POST['LIBRE__'.$num];
			$rep['LIBRE'] = $contenu;
			$rep['NbReponses'] = 1;
			break;

			case 'ASSIGNE':
			$c = 1;
			$ASSIGNE = array();
			$ASSIGNE_G = array();
			$ASSIGNE_D = array();
			while(isset($_POST['ASSIGNE_'.$c.'_1__'.$num])){
				$rG = $_POST['ASSIGNE_'.$c.'_1__'.$num];
				array_push($ASSIGNE_G, $rG);
				$rD = $_POST['ASSIGNE_'.$c.'_2__'.$num];
				array_push($ASSIGNE_D, $rD);
				$c++;
			}
			$ASSIGNE['ASSIGNE_G'] = $ASSIGNE_G;
			$ASSIGNE['ASSIGNE_D'] = $ASSIGNE_D;
			$rep['ASSIGNE'] = $ASSIGNE;
			$rep['NbReponses'] = ($c-1)*2;
			break;
			
			// QCU et QCM
			default:
			$c = 1;
			$QC = array();
			$contenuReps = array();
			$sontJustes = array();
			while(isset($_POST[$type.'_'.$c.'__'.$num])){
				$contenu = $_POST[$type.'_'.$c.'__'.$num];
				array_push($contenuReps, $contenu);
				if($type == 'QCM')
					$estJuste = isset($_POST['EstJuste'.$type.'_'.$c.'__'.$num]);
				else
					$estJuste = isset($_POST['EstJuste'.$type.'__'.$num]);					
				array_push($sontJustes, $estJuste);
				$c++;
			}
			$QC['contenuReps'] = $contenuReps;
			$QC['sontJustes'] = $sontJustes;
			$rep[$type] = $QC;
			$rep['NbReponses'] = $c-1;
			break;
		}
		return $rep;
	}

	public function enregistrerReponses($idQuestion, $type, $rep){
		switch ($type) {
			case 'LIBRE':
			$contenu =$rep['LIBRE'];
			Reponse::create($idQuestion, 1, NULL, $contenu);
			break;

			case 'ASSIGNE':
			$ASSIGNE = $rep['ASSIGNE'];
			$ASSIGNE_G = $ASSIGNE['ASSIGNE_G'];
			$ASSIGNE_D = $ASSIGNE['ASSIGNE_D'];
			for($i=0;i<sizeof($ASSIGNE_G);$i++){
				Reponse::create($idQuestion, 1, 0, $ASSIGNE_G[$i]);
				Reponse::create($idQuestion, 1, 1, $ASSIGNE_D[$i]);

						// REMPLIR LA TABLE RELIEE A 
			}
			break;
			
			// QCU et QCM
			default:
			$QC = $rep[$type];
			$contenuReps = $QC['contenuReps'];
			$sontJustes = $QC['sontJustes'];
			for($i=0;$i<sizeof($contenuReps);$i++){
				if($sontJustes[$i])
					Reponse::create($idQuestion, 1, NULL, $contenuReps[$i]);
				else
					Reponse::create($idQuestion, 0, NULL, $contenuReps[$i]);
			}
			break;
		}
	}




}


?>
