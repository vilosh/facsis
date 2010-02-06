<?php

class Template {
	protected $variables;
	protected $file;
	public function __construct( $file, $variables = null) {
		$this->variables = $variables ? $variables : array();		
		$this->file = $file;
	}

	public function render() {
		foreach($this->variables as $__key => $__value) {
			$$__key = $__value;
		}
		include($this->file);
	}

	public static function renderize( $file, $variables = null ) {
		$template = new Template( $file, $variables );
		$template->render();
	}
}
