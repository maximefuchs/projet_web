<?php

class AnonymousView extends View{ 

	public function renderAnoMenu(){
		require_once(__ROOT_DIR.'/templates/menuAnoTemplate.php');
	}

	public function render(){
		require_once(__ROOT_DIR.'/templates/bienvenue.php');
	}

}

?>