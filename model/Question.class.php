<?php

class Question extends Model{

	static $table_name = 'QUESTION';

	static $colId = 'ID_QUESTION';
	static $colIdConsigne = 'ID_CONSIGNE';
	static $colTag = 'TAG';
	static $colType = 'TYPE_QUESTION';
	static $colNbRep = 'NB_REPONSES';
	static $colDesQu = 'DESCRIPTION_QUESTION';


	// getters
	public function id() { return $this->props[self::$colId]; }
	public function idconsigne() { return $this->props[self::$colIdConsigne]; }
	public function tag() { return $this->props[self::$colTag]; }
	public function type() { return $this->props[self::$colType]; }
	public function nombre_reponses() { return $this->props[self::$colNbRep]; }
	public function description_question() { return $this->props[self::$colDesQu]; }

	public function __construct(){
		parent::__construct();
	}

	// récupération de toutes les questions
	public static function getList(){
		$questions = parent::exec('QUESTION_LIST');
		return $questions->fetchAll();
	}

	// création d'une nouvelle question
	public static function create($id_consigne, $tag, $type, $nb_reponse, $description_question){
		$array = array(':id_c' => $id_consigne,
						':tag' => $tag,
						':type' => $type,
						':nb_r' => $nb_reponse,
						':des_ques' => $description_question);
		parent::exec('QUESTION_CREATE', $array);
	}

	//chercher une question avec son id
	public static function getQuestionById($id){
		$q = parent::exec('GET_QUESTION_BY_ID', array(':id_q' => $id));
		return $q->fetch();
	}

	// récupérer toutes les questions d'un questionnaires
	public static function getQuestionsDeQuestionnaireId($id_questionnaire){
		$questions = parent::exec('GET_QUESTIONS_BY_QUESTIONNAIRE',
									array(':id_q' => $id_questionnaire));
		return $questions->fetchAll();
	}
}

 ?>
