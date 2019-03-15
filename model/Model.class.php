<?php

class Model extends MyObject{

	static $queries;
	static $props;

	protected static function db(){
		return DatabasePDO::getPDO();
	}
	protected static function query($sql){
		$st = static::db()->query($sql) or die("sql query error ! request : " . $sql);
		$st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
		return $st;
	}

	public function __construct() {
		parent::__construct();
	}
	public function __get($key) {
		return self::$props[$key];
	}
	public function __set($query, $val) {
		self::$props[$query] = $val;
	}

	static function exec($key,$values=NULL){
		$sql = self::$queries[$key];
		//var_dump($sql);
		if(!is_null($values)){
			$requete = static::db()->prepare($sql);
			// foreach ($values as $key => &$value) {
			// 	$requete->bindParam($key, $value);
			// }
			$requete->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
			$requete->execute($values);		
			return $requete;
		} else {
			return static::query($sql);
		}
	}
	
	public static function addSqlQuery($key, $value){
		self::$queries[$key] = $value;
	}
}

?>
