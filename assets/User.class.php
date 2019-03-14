<?php

class User extends Model{

	protected static $table_name = 'user';

	public function __construct(){
		parent::__construct();
	}

	public static function getList() {
		return parent::exec('USER_LIST');
	}

//renvoi un boolean pour savoir si un login est déjà utilisé
	public static function isLoginUsed($login){
		$r = parent::exec('USER_IS_LOGIN_USED',
			array(':login' => $login));
		$us = $r->fetch();
		// var_dump($us);
		return isset($us['user_login']);
	}

//ajout d'un nouvel utilisateur, et connexion directe
	public static function create($login, $mdp, $mail, $nom, $prenom){

		$array = array( ':login' => $login,
			':email' => $mail,
			':mdp' => $mdp,
			':nom' => $nom,
			':prenom' => $prenom);
		//var_dump($array);
		$sth = parent::exec('USER_CREATE',$array);
		$user = static::tryLogin($login, $mdp);
		return $user;
	}

//connexion d'un utilisateur
	public static function tryLogin($login, $mdp){
		$r = parent::exec('USER_CONNECT',
			array(':login' => $login,
				':mdp' => $mdp));
		$user = $r->fetch();
		//var_dump($user);
		return $user;
	}

//récupération d'un utilisateur par son id
	public static function getUserById($id){
		$r = parent::exec('USER_GET_BY_ID',
			array(':id' => $id));
		$user = $r->fetch();
		return $user;
	}
}
?>
