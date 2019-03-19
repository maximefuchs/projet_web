<?php

class UserController extends Controller{

	protected $user;
	static $quest;

	public function __construct($request){
		parent::__construct($request);
		session_start();

		$userId = NULL;
		if(isset($_SESSION['ID_USER'])){
			$this->user = User::getUserById($_SESSION['ID_USER']);
			//var_dump($this->user);
			//ValidateQuestionnaire
			// if(isset($_POST['titreQuestaire'])){
			// 	$this->methodName = "validateQuestionnaire";
			// }
		} else {
			$userId = $request->readGet('userId');
			$this->user = User::getUserById($userId);
			$_SESSION['ID_USER'] = $this->user->id();

		}
	}

	public function defaultAction($request){
		$view = new UserView($this, 'userBienvenue', array('user' => $this->user));
		$view->render();
	}

	public function profilAction($request){
		$view = new UserView($this, 'userProfil', array('user' => $this->user ));
		$view->render();
	}

	public function questionnairesAction($request){
		self::$quest=Questionnaire::getQuestionnairesByUserId($this->user->id());
		$view = new UserView($this, 'questionnaires', array('user' => $this->user, 'questionnaires' => self::$quest));
		$view->render();
	}
	public function nouveauQuestionnaireAction($request){
		$view = new UserView($this, 'nouveauQuestionnaire', array('user' => $this->user));
		$view->render();
	}

	// public function validateQuestionnaire($request){
	// 	$login = $request->readPost('inscLogin');
	// 	if(User::isLoginUsed($login)) {
	// 		$view = new AnonymousView($this, 'inscription');
	// 		$view->setArg('inscErrorText','Login déjà utilisé');
	// 		$view->render();
	// 	} else {
	// 		$mdp = $request->readPost('inscPassword');
	// 		$nom = $request->readPost('nom');
	// 		$prenom = $request->readPost('prenom');
	// 		$mail = $request->readPost('mail');
	// 		$role= $request->readPost('role');
	// 		if($role=='Etudiant'){
	// 			$promo=$request->readPost('Promo');
	// 			$groupe=$request->readPost('Groupe');
	// 			$td=$request->readPost('td');
	// 			$user = User::create($login, $mdp, $mail, $nom, $prenom,$role,$promo, $groupe, $td, $matricule=null, $matiere_enseignee=null, $int_ext=null);
	// 		} else if ($role == 'Enseignant'){
	// 			$matricule=$request->readPost('Matricule');
	// 			$matiere_enseignee=$request->readPost('Mat_enseignee');
	// 			$int_ext=$request->readPost('Int_Ext');
	// 			$user = User::create($login, $mdp, $mail, $nom, $prenom,$role,$promo=null, $groupe=null, $td=null, $matricule, $matiere_enseignee, $int_ext);
	//
	// 		}
	// 		if(!$user) {
	// 			$view = new AnonymousView($this,'inscription');
	// 			$view->setArg('inscErrorText', 'Impossible de finaliser l\'inscription');
	// 			$view->render();
	// 		} else {
	// 			$this->connexion($user);
	// 		}
	// 	}
	// }

}

?>
