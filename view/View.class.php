<?php

class View extends MyObject {

	protected $templateNames;
	protected $args;

	public function __construct($controller, $templateName,$args = array()) {
		parent::__construct();

		$this->templateNames = array();
		$this->templateNames['head'] = 'head';
		$this->templateNames['top'] = 'top';
		$this->templateNames['menu'] = 'menu';
		$this->templateNames['foot'] = 'foot';
		$this->templateNames['content'] = $templateName;
		$this->args = $args;
		$this->args['controller'] = $controller;
	}

	public function setArg($key, $val) {
		$this->args[$key] = $val;
	}

	public function render() {
		$this->loadTemplate($this->templateNames['head'], $this->args);
		echo "1<br>";
		$this->loadTemplate($this->templateNames['top'], $this->args);
		echo "2<br>";
		$this->loadTemplate($this->templateNames['menu'], $this->args);
		echo "3<br>";
		$this->loadTemplate($this->templateNames['content'], $this->args);
		echo "4<br>";
		$this->loadTemplate($this->templateNames['foot'], $this->args);
		echo "5<br>";
	}

	public function loadTemplate($name,$args=NULL) {
		$templateFileName = __ROOT_DIR 	. '/templates/'. $name . 'Template.php';
		if(is_readable($templateFileName)) {
			if(isset($args))
				foreach($args as $key => $value)
					$key = $value;
				require_once($templateFileName);
			}
			else
				throw new Exception('undefined template "' . $name .'"');
	}
}


?>