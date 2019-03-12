<?php

class User extends Model{

	protected static $table_name = 'USER';

	public function __construct(){
		parent::__construct();
	}

	public static function addSqlQuery($key, $value){
		self::$props[$key] = $value;
	}
	
	public static function getList() {
		return parent::exec('USER_LIST'); 
	}

	public static function isLoginUsed($login){

		$r = parent::exec('USER_IS_LOGIN_USED', 
			array(':login' => $login));
		$us = $r->fetch();
		var_dump($us);
		return isset($us['user_login']);
	}

	public static function create($login, $mdp, $mail, $nom, $prenom){

		$array = array( ':login' => $login,
				':email' => $mail,
				':mdp' => $mdp,
				':nom' => $nom,
				':prenom' => $prenom);
		var_dump($array);
		$sth = parent::exec('USER_CREATE',$array);
		$user = static::tryLogin($login, $mdp);
		return $user;
	}

	public static function tryLogin($login, $mdp){
		$r = parent::exec('USER_CONNECT',
			array(':login' => $login,
				':mdp' => $mdp));
		$user = $r->fetch();
		var_dump($user);
		return $user;
	}

	public static function getUserById($id){
		$r = parent::exec('USER_GET_BY_ID',
				array(':id' => $id));
		$user = $r->fetch();
		return $user;
	}

	public function id() { return $this->props[self::$table_name.'_ID']; }
	//public function roleId() { return $this->props[self::$table_name.'_ROLE']; }
	//public function role() { return Role::getWithId($this->roleId()); }
	//public function isAdmin() { return ($this->role()->isAdmin()) || ($this->role()->isSuperAdmin()); }
	//public function isSuperAdmin() { return $this->role()->isSuperAdmin();


	}

	?>