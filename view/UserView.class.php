<?php

class UserView extends View {

	public function render(){
		require_once(__ROOT_DIR."/templates/userTemplate.php");
	}

	public function renderUserMenu(){
		require_once(__ROOT_DIR."/templates/menuUserTemplate.php");
	}

	public function renderProfile(){
		require_once(__ROOT_DIR."/templates/profileTemplate.php");
	}
}
?>