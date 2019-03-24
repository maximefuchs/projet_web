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
	static $colPromo = 'PROMO';
	static $colGroupe = 'GROUPE';
	static $colTD = 'TD';


	// getters
	public function id() { return $this->props[self::$colId]; }
	public function idConsigne() { return $this->props[self::$colIdConsigne]; }
	public function titre() { return $this->props[self::$colTitre]; }
	public function description_questionnaire() { return $this->props[self::$colDescQue]; }
	public function date_ouverture() { return $this->props[self::$colDateOuv]; }
	public function date_fermeture() { return $this->props[self::$colDateFerm]; }
	public function etat() { return $this->props[self::$colEtat]; }
	public function promo() { return $this->props[self::$colPromo]; }
	public function groupe() { return $this->props[self::$colGroupe]; }
	public function td() { return $this->props[self::$colTD]; }


	public function __construct(){
		parent::__construct();
	}

	static function afficheDate($string){
		$afficher = "";
		$mois = array('janvier', 'fevrier', 'mars', 'avril', 'mai', 'juin', 
		'juillet', 'aout', 'septembre', 'octobre', 'novembre', 'decembre');
		$s = explode(" ", $string);
		$date = $s[0];
		$heure = $s[1];
		$date = explode("-", $date);
		$afficher= $date[2]." ".$mois[intval($date[1])-1]." ".$date[0];
		$heure = explode(":", $heure);
		$afficher = $afficher." à ".$heure[0]."h".$heure[1];
		return $afficher;
	}

	// récupérer tous les questionnaires
	public static function getList(){

		//EMPLACEMENT DE CETTE FONCTION?????
		parent::exec('UPDATE_ETAT_QUESTIONNAIRES');

		
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
	public static function create($consigne, $userID, $titreQ, $descriptionQ, $dateO, $heureO, $dateF, $heureF){
		// gérer les dates
		date_default_timezone_set('Europe/Paris');
		$hO = explode(':',$heureO);
		$dO = new DateTime($dateO);
		$dO->setTime($hO[0], $hO[1]);
		$hF = explode(':',$heureF);
		$dF = new DateTime($dateF);
		$dF->setTime($hF[0], $hF[1]);
		$etat=self::defEtat($dO, $dF);


		$array = array(':id_c' => $consigne,
			':userId'=>$userID,
			':titre' => $titreQ,
			':des_qu' => $descriptionQ,
			':d_o' => $dO->format('Y-m-d H:i:s'), //dateTime to String
			':d_f' => $dF->format('Y-m-d H:i:s'),
			':etat' => $etat);
		$sth=	parent::exec('QUESTIONNAIRE_CREATE',$array);
		//$id_questionnaire=parent::exec('QUESTIONNAIRE_GET_LAST_ID_CREATED',)
		return $sth; //bool
	}
	//Calcul l'état du questionnaire en fonction du jour actuel
	public static function defEtat($ouv, $ferm){
		$aujour=new DateTime("now"); //Date et heure du jour
		if($ouv>$ferm){
			return false;
		} else{
			if ($ouv>$aujour)
				return "Non commencé";
			else if ($ouv<$aujour && $aujour<$ferm)
				return "En cours";
			else
				return "Terminé";
		}
	}

	public static function associerQuestionnaireUser($userId){

	}

	public static function getQuestionnaireByEtudiant($promo, $groupe, $td){ 
		$questionnaires = parent::exec('GET_QUESTIONNAIRES_BY_ETUDIANT',
			array(':promo'=>$promo, ':groupe'=>$groupe, ':td'=>$td));
		return $questionnaires->fetchAll();
	}

}

?>
