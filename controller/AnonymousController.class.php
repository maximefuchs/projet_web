<?php

class AnonymousController extends Controller{

	public function __construct($request){
		parent::__construct($request);

		if(isset($_POST['inscLogin'])){
			$this->methodName = "validateInscription";
		}
		elseif (isset($_POST['connLogin'])) {
			$this->methodName = "validateConnexion";
		}
	}

//pour un utilisateur anonyme, on affichera toujours le menu connexion/inscription
	public function afficherAnoMenu($request){
		$view = new AnonymousView($this, 'menu');
		$view->render();
	}

	public function defaultAction($request) {
		$view = new AnonymousView($this, 'bienvenue');
		$view->render();
	}

	public function inscriptionAction($request){
		$view = new InscriptionView($this, 'inscription');
		$view->render();
	}

	public function connexionAction($request){
		$view = new connexionView($this, 'connexion');
		$view->render();
	}

	public function validateInscription($request) {
		$login = $request->readPost('inscLogin');
		if(User::isLoginUsed($login)) {
			//$view = new View($this,'inscription');
			//$view->setArg('inscErrorText','This login is already used');
			$view = new AnonymousView($this, 'bienvenue');
			$view->render();
			echo "login déjà utilisé<br>";
		} else {
			$mdp = $request->readPost('inscPassword');
			$nom = $request->readPost('nom');
			$prenom = $request->readPost('prenom');
			$mail = $request->readPost('mail');
			$user = User::create($login, $mdp, $mail, $nom, $prenom);
			if(!isset($user['user_id'])) {
				//$view = new View($this,'inscription');
				//$view->setArg('inscErrorText', 'Cannot complete inscription');
				
				//$view = new View($this);
				//$view->render();
				echo "Erreur pendant l'inscription<br>";
			} else {
				$this->connexion($user);
			}
		}
	}

	public function validateConnexion($request){
		$login = $request->readPost('connLogin');
		$mdp = $request->readPost('connPassword');
		$user = User::tryLogin($login, $mdp);
		if(!isset($user['user_id'])){
			$view = new AnonymousView($this, 'bienvenue');
			$view->render();
			echo "Mauvais login ou mot de passe<br>";
		} else {
			$this->connexion($user);
		}
	}

	public function connexion($user){
		$newRequest = new Request();
		$newRequest->writeGet('controller','user');
		$newRequest->writeGet('userId',$user['user_id']);
		$controller = Dispatcher::dispatch($newRequest);
		$controller->execute();
	}


}

?>