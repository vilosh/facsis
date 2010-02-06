<?php

abstract class Query {
	abstract protected function getString();

	public function __toString(){
		return $this->getString();
	}

	public function run() {
		$connection =  Configuration::configuration()->getConnection();
		return $connection->run( $this );
	}
}
	

