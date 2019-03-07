<?php

class AnonymousController extends Controller{

	public function __construct($request){
		if(isset($_POST['nom'])){
			$this->validateInscription($request);
		}
	}

	public function defaultAction($request) {
		$view = new AnonymousView($this);
		$view->render();
	}

	public function inscriptionAction(){
		$view = new InscriptionView($this);
		$view->render();
	}

	public function validateInscription($request) {
		$login = $request->read('inscLogin');
		if(User::isLoginUsed($login)) {
			//$view = new View($this,'inscription');
			//$view->setArg('inscErrorText','This login is already used');
			$view = new View($this);
			$view->render();
			echo "login déjà utilisé";
		} else {
			$mdp = $request->read('inscPassword');
			$nom = $request->read('nom');
			$prenom = $request->read('prenom');
			$mail = $request->read('mail');
			$user = User::create($login, $mdp, $mail, $nom, $prenom);
			if(!isset($user)) {
				//$view = new View($this,'inscription');
				//$view->setArg('inscErrorText', 'Cannot complete inscription');
				$view = new View($this);
				$view->render();
				echo "Erreur pendant l'inscription";
			} else {
				$newRequest = new Request();
				$newRequest->write('controller','user');
				$newRequest->write('userId',$user->id);
				$controller = Dispatcher::dispatch($newRequest);
				$controller->execute();
			}
		}
	}

	public function connexionAction(){
		$view = new connexionView($this);
		$view->render();
	}


}

?>