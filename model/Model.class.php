<?php

class Model extends MyObject{

	protected static $queries;

	protected static function db(){
		return DatabasePDO::getPDO();
	}
	protected static function query($sql){
		$st = static::db()->query($sql) or die("sql query error ! request : " . $sql);
		$st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
		return $st;
	}

	public function __construct($queries = array()) {
		parent::__construct();
		$this->queries = $queries;
	}
	public function __get($query) {
		return $this->queries[$query];
	}
	public function __set($query, $val) {
		$this->queries[$query] = $val;
	}

	static function exec($key,$values=NULL){
		
		$sql = static::$queries[$key];
		$requete = static::db()->prepare($sql);
		//var_dump($requete);
		if(!is_null($values)){
			foreach ($values as $key => &$value) {
				//var_dump($key);
				//var_dump($value);
				$requete->bindParam($key, $value);
			}
		}
		
		$requete->execute();
		return $requete;
	}

}

?>
