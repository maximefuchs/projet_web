<?php

class AnonymousView extends View{ 

	public function render(){
		require_once(__ROOT_DIR.'/templates/menuTemplate.php');
	}
}

?>