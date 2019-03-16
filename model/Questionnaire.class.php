<?php 

class Questionnaire extends Model{

	protected static $table_name = 'questionnaire';

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