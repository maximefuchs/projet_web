<?php

class AnonymousController extends Controller{

	public function __construct($request){
		if(isset($_POST['inscLogin'])){
			$this->validateInscription($request);
		}
		elseif (isset($_POST['connLogin'])) {
			$this->validateConnexion($request);
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
		$login = $request->read('inscLogin');
		if(User::isLoginUsed($login)) {
			//$view = new View($this,'inscription');
			//$view->setArg('inscErrorText','This login is already used');
			$view = new View($this);
			$view->render();
			echo "login déjà utilisé<br>";
		} else {
			$mdp = $request->read('inscPassword');
			$nom = $request->read('nom');
			$prenom = $request->read('prenom');
			$mail = $request->read('mail');
			$user = User::create($login, $mdp, $mail, $nom, $prenom);
			if(is_null($user)) {
				//$view = new View($this,'inscription');
				//$view->setArg('inscErrorText', 'Cannot complete inscription');
				
				//$view = new View($this);
				//$view->render();
				echo "Erreur pendant l'inscription<br>";
			} else {
				$newRequest = new Request();
				$newRequest->write('controller','user');
				$newRequest->write('userId',$user->id);
				$controller = Dispatcher::dispatch($newRequest);
				$controller->execute();
			}
		}
	}

	public function validateConnexion($request){
		$login = $request->read('connLogin');
		$mdp = $request->read('connPassword');
		$user = User::authentification($login, $mdp);
		if(is_null($user)){
			//$view = new View($this);
			//$view->render();
			echo "Mauvais login ou mot de passe<br>";
		} else {
			echo "new Dispatch <br>";
			$newRequest = new Request();
			$newRequest->write('controller','user');
			$newRequest->write('userId',$user->id);
			$controller = Dispatcher::dispatch($newRequest);
			$controller->execute();
		}
	}


}

?>