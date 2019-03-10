<?php

class Model extends MyObject{

	protected static $props;

	protected static function db(){
		return DatabasePDO::getPDO();
	}
	protected static function query($sql){
		$st = static::db()->query($sql) or die("sql query error ! request : " . $sql);
		$st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
		return $st;
	}

	public function __construct($props = array()) {
		$this->props = $props;
	}
	public function __get($prop) {
		return $this->props[$prop];
	}
	public function __set($prop, $val) {
		$this->props[$prop] = $val;
	}

	static function exec($key,$values=NULL){
		$sql = static::$props[$key];
		$requete = static::db()->prepare($sql);
		if(!is_null($values)){
			foreach ($values as $key => $value) {
				$requete->bindParam($key, $value);
			}
		}
		$requete->execute();
		return $requete->fetchAll();
	}
	
}

?>