<?php

class UserView extends View {

	public function render(){
		require_once(__ROOT_DIR."/templates/userTemplate.php");
	}

	public function renderUserMenu(){
		echo 'render user menu <br>';
		require_once(__ROOT_DIR."/templates/menuUserTemplate.php");
	}
}
?>