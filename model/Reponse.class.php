<?php 

class Reponse extends Model{

	static $table_name = 'REPONSE_PROPOSEE';

	static $colId = 'ID_REPONSESP';
	static $colIdQuestion = 'ID_QUESTION';
	static $colEstJuste = 'EST_JUSTE_P';
	static $colColonne = 'COLONNE';
	static $colContenu = 'CONTENU';


	// getters
	public function id() { return $this->props[self::$colId]; }
	public function idQuestion() { return $this->props[self::$colIdQuestion]; }
	public function estJuste() { return $this->props[self::$colEstJuste]; }
	public function colonne() { return $this->props[self::$colColonne]; }
	public function contenu() { return $this->props[self::$colContenu]; }

	public function __construct(){
		parent::__construct();
	}

	// récupération de toutes les questions
	public static function getList(){
		$reponses = parent::exec('REPONSE_LIST');
		return $reponses->fetchAll();
	}

	// création d'une nouvelle question
	public static function create($idQuestion, $estJuste, $colonne, $contenu){
		$array = array(':id_question' => $idQuestion,
			':estJuste' => $estJuste,
			':colonne' => $colonne,
			':contenu' => $contenu);
		parent::exec('REPONSE_CREATE', $array);
	}

	//chercher une question avec son id
	public static function getReponseById($id){
		$q = parent::exec('GET_REPONSE_BY_ID', array(':id_r' => $id));
		return $q->fetch(); 
	}
	
	// récupérer toutes les questions d'un questionnaires
	public static function getReponseByIdQuestion($id_question){
		$questions = parent::exec('GET_REPONSE_BY_IDQUESTION',
			array(':id_question' => $id_question));
		return $questions->fetchAll();
	}

	public static function getReponseByIdQuestionnaire($id_questionnaire){
		$questions = parent::exec('GET_REPONSE_BY_IDQUESTIONNAIRE', array(':id_questionnaire' => $id_questionnaire));
		return $questions->fetchAll();
	}
}


?>