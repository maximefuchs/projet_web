<?php 

class Questionnaire extends Model{

	protected static $table_name = 'questionnaire';

	protected static $colId = 'ID_QUESTIONNAIRE';
	protected static $colIdConsigne = 'ID_CONSIGNE';
	protected static $colTitre = 'TITRE';
	protected static $colDescQue = 'DESCRIPTION_QUESTIONNAIRE';
	protected static $colDateOuv = 'DATE_OUVERTURE';
	protected static $colDateFerm = 'DATE_FERMETURE';
	protected static $colEtat = 'ETAT';

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

}

 ?>