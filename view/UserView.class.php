<?php

class UserView extends View {

/*	public function render(){
		require_once(__ROOT_DIR."/templates/userTemplate.php");
	}

	public function renderUserMenu(){
		require_once(__ROOT_DIR."/templates/menuUserTemplate.php");
	}

	public function renderProfile($user){
		require_once(__ROOT_DIR."/templates/userProfileTemplate.php");
	}
*/
	public function __construct($controller,$templateName, $args) {
		parent::__construct($controller,$templateName,$args);
		$this->templateNames['menu'] = 'userMenu';
		//$this->templateNames['top'] = 'userTop';
		if(!$this->args['user'])
			throw new Exception('a user must be defined');
	}
}
?>