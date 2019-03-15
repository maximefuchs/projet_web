<?php 

class Question extends Model{

	protected static $table_name = 'question';

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
