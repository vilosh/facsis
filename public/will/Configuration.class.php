<?php

require_once( 'will/database/Connection.class.php' );

class Configuration {
	private static $configuration = null;
	private $confDb;

	public function __construct() {
		$this->load();
	}

	private function load() {
		include('configuration.php');
		$this->confDb = $confDb;
	}

	public static function configuration() {
		if( self::$configuration == null) {
			self::$configuration = new Configuration();
		}
		return self::$configuration;		
	}


	/* gets & sets */

	public function getConfDb() {
		return $this->confDb;
	}

	public function setConfDb($conf) {
		$this->confDb = $conf;
	}

	public function getConnection() {
		$connection =  new Connection( $this->confDb );
		return $connection;
	}

}
