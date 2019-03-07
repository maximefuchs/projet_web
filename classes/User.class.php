<?php

class User{

	public static function isLoginUsed($login){
		$pdo = DatabasePDO::getPDO();
		$sql = "SELECT * FROM user u where u.login = '".$login."'";
		$req = $pdo->query($sql);
		$data = $req->fetch(PDO::FETCH_OBJ);
		return !empty($data);
	}

	public static function create($login, $mdp, $mail, $nom, $prenom){
		$pdo = DatabasePDO::getPDO();
		$sql = "INSERT INTO `user` (`id`, `login`, `motdepasse`, `mail`, `nom`, `prenom`) 
		VALUES (NULL, '".$login."', '".$mdp."', '".$mail."', '".$nom."', '".$prenom."')";

		$pdo->query($sql);

		$sql = "SELECT * FROM user u where u.login = '".$login."'";
		$req = $pdo->query($sql);
		$data = $req->fetch(PDO::FETCH_OBJ);
		return $data;
	}

	public static function getUserById($id){
		$pdo = DatabasePDO::getPDO();
		$sql = "SELECT * FROM user u where u.id = ".$id;
		$req = $pdo->query($sql);
		$data = $req->fetch(PDO::FETCH_OBJ);
		return $data;
	}

}

?>