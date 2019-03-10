<?php

class User extends Model{

	protected static $table_name = 'USER';

	public function __construct(){
		parent::__construct();
		require_once(__ROOT_DIR.'/sql/User.sql.php');
	}

	public static function addSqlQuery($key, $value){
		$this->props[$key] = $value;
	}
	
	public static function getList() {
		return parent::exec('USER_LIST'); 
	}

	public static function isLoginUsed($login){
		$pdo = DatabasePDO::getPDO();
		$sql = "SELECT * FROM user u where u.login = '".$login."'";
		$req = $pdo->query($sql);
		$data = $req->fetch(PDO::FETCH_OBJ);
		return !empty($data);
	}

	public static function create($login, $mdp, $mail, $nom, $prenom){
	/*	$pdo = DatabasePDO::getPDO();
		$sql = "INSERT INTO `user` (`id`, `login`, `motdepasse`, `mail`, `nom`, `prenom`) 
		VALUES (NULL, '".$login."', '".$mdp."', '".$mail."', '".$nom."', '".$prenom."')";

		$pdo->query($sql);

		$sql = "SELECT * FROM user u where u.login = '".$login."'";
		$req = $pdo->query($sql);
		$data = $req->fetch(PDO::FETCH_OBJ);
		return $data;*/

		$sth = parent::exec('USER_CREATE',
			array( ':login' => $login,
				':email' => $mail,
				':mdp' => $mdp,
				':nom' => $nom,
				':prenom' => $prenom));
		return static::tryLogin($login, $mdp);
	}

	public static function tryLogin($login, $mdp){
		$sth = parent::exec('USER_CONNECT',
			array(':login' => $login,
				':mdp' => $mdp));
		return $sth;
	}

	public static function getUserById($id){
		$pdo = DatabasePDO::getPDO();
		$sql = "SELECT * FROM user u where u.id = ".$id;
		$req = $pdo->query($sql);
		$data = $req->fetch(PDO::FETCH_OBJ);
		return $data;
	}

	public static function authentification($login, $mdp){
		$pdo = DatabasePDO::getPDO();
		$sql = "SELECT * FROM user u WHERE u.login = '".$login."' AND u.motdepasse = '".$mdp."'";
		$r = $pdo->query($sql);
		$data = $r->fetch(PDO::FETCH_OBJ);
		return $data;
	}

	public function id() { return $this->props[self::$table_name.'_ID']; }
	//public function roleId() { return $this->props[self::$table_name.'_ROLE']; }
	//public function role() { return Role::getWithId($this->roleId()); }
	//public function isAdmin() { return ($this->role()->isAdmin()) || ($this->role()->isSuperAdmin()); }
	//public function isSuperAdmin() { return $this->role()->isSuperAdmin();


	}

	?>