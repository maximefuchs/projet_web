<?php

class User extends Model{

	protected static $table_name = 'user';
	protected static $colId = 'ID_USER';
	protected static $colLogin = 'LOGIN';
	protected static $colMdp = 'PASSWORD';
	protected static $colNom = 'NOM';
	protected static $colPrenom = 'PRENOM';
	protected static $colEmail = 'EMAIL';
	protected static $colRole = 'ROLE';
	protected static $colMatricule = 'MATRICULE';
	protected static $colIntExt = 'INTERN_EXT';
	protected static $colMatiere = 'MATIERE';
	protected static $colPromo = 'PROMO';
	protected static $colDateSortie = 'DATE_SORITE';
	protected static $colDateEntree = 'DATE_ENTREE';
	protected static $colTD = 'TD';
	protected static $colGroupe = 'GROUPE';



	public function __construct(){
		parent::__construct();
	}

	// récupération de toutes les users
	public static function getList() {
		$users = parent::exec('USER_LIST');
		return $users->fetchAll();
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

	public function id() { return $this->props[$colId]; }
	public function login() { return $this->props['LOGIN']; }
	public function mdp() { return $this->props['ID']; }
	//public function id() { return $this->props['ID']; }
	public function role() { return $this->props['ROLE']; }
	public function isSuperAdmin() { return $this->id()==8;}
}
	?>
