<?php

class Questionnaire extends Model{

	static $table_name = 'QUESTIONNAIRE';

	static $colId = 'ID_QUESTIONNAIRE';
	static $colIdConsigne = 'ID_CONSIGNE';
	static $colTitre = 'TITRE';
	static $colDescQue = 'DESCRIPTION_QUESTIONNAIRE';
	static $colDateOuv = 'DATE_OUVERTURE';
	static $colDateFerm = 'DATE_FERMETURE';
	static $colEtat = 'ETAT';
	static $colIdUser = 'ID_USER';

	// getters
	public function id() { return $this->props[self::$colId]; }
	public function idConsigne() { return $this->props[self::$colIdConsigne]; }
	public function titre() { return $this->props[self::$colTitre]; }
	public function description_questionnaire() { return $this->props[self::$colDescQue]; }
	public function date_ouverture() { return $this->props[self::$colDateOuv]; }
	public function date_fermeture() { return $this->props[self::$colDateFerm]; }
	public function etat() { return $this->props[self::$colEtat]; }


	public function __construct(){
		parent::__construct();
	}

	// récupérer tous les questionnaires
	public static function getList(){
		$questionnaires = parent::exec('QUESTIONNAIRE_LIST');
		return $questionnaires->fetchAll();
	}

	public static function getQuestionnaireById($id){
		$q = parent::exec('GET_QUESTIONNAIRE_BY_ID',
		array(':id_q'=>$id));
		return $q->fetch();
	}

	// recuperer les questionnaires d'un utilisateur
	public static function getQuestionnairesByUserId($userId){
		$questionnaires = parent::exec('GET_QUESTIONNAIRES_BY_IDUSER',
		array(':id_user'=>$userId));
		return $questionnaires->fetchAll();
	}

	//ajout d'un nouveau questionnaire
	public static function create($titreQ, $descriptionQ, $dateO, $dateF, $consigne,$etat,$userID){
		// $etat=self::defEtat($dateO, $dateF);
		$array = array(':id_c' => $consigne,
		':userId'=>$userID,
		':titre' => $titreQ,
		':des_qu' => $descriptionQ,
		':d_o' => $dateO,
		':d_f' => $dateF,
		':etat' => $etat);
	$sth=	parent::exec('QUESTIONNAIRE_CREATE',$array);
		//$id_questionnaire=parent::exec('QUESTIONNAIRE_GET_LAST_ID_CREATED',)
		return $sth; //bool
	}
	//Calcul l'état du questionnaire en fonction du jour actuel
	public static function defEtat($ouv, $ferm){
		date_default_timezone_set('Europe/Paris');
		$date1=new DateTime($ouv); //DateTime() permet la comparaison de date
		$date2=new DateTime($ferm);
		$aujour=new DateTime("now"); //Date et heure du jour
		if($date1>$date2){
			return false;
		} else{
			if ($date1>$aujour)
			return "Non commencé";
			else if ($date1<$aujour && $aujour<$date2)
			return "En cours";
			else
			return "Terminé";
		}
	}

	public static function associerQuestionnaireUser($userId){

	}

}

?>
