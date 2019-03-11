<?php

class UserView extends View {

	public function __construct($controller,$templateName, $args) {
		parent::__construct($controller,$templateName,$args);
		$this->templateNames['menu'] = 'userMenu';
		//$this->templateNames['top'] = 'userTop';
		if(!$this->args['user'])
			throw new Exception('a user must be defined');
	}
}
?>