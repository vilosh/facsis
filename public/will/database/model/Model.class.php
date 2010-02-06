<?php

class Model {
	protected $values;
	public function __construct($values) {
		$this->values = $values;
	}

	public function getValue($key) {
		if($this->values[$key]) {
			return $this->values[$key];
		}
		$method = "get" . ucfirst( $key );
		if(method_exists($this, $method))
			return $this->$method();
		return null;
	}

	public function setValue($key, $value) {
		if(array_key_exists( $key, $this->values)) {
			$this->values[$key] = $value;
		} else {
			$method = "set" . ucfirst($key);
			if(method_exists($this, $method())) 
				$this->$method();
		}
	}


	public function __get($key) {
		return $this->getValue($key);
	}

	public function __set($key, $value) {
		$this->setValue($key, $value);
	}

}

