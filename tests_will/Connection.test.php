<?php
require_once('simpletest/autorun.php');

require_once('../public/bootstrap.php');

require_once('will/Configuration.class.php');

class ConnectionTest extends UnitTestCase {
	function getConfiguration() {
		$config = Configuration::configuration();
		$config->setConfDb( array( 
			'host' => 'localhost', 
			'user' => 'willian', 
			'pass' => 'rancharia', 
			'dbname' => 'trazai_tests' ));
		return $config;

	}

	function testRunQuery() {
		$query = "select * from connection_tests";
		$queryCount = "select count(*) as ct from connection_tests";
		$connection = $this->getConfiguration()->getConnection();
		
		$result = $connection->run( $query );
		$resultCount = $connection->run( $queryCount );

		$this->assertTrue( sizeof($result) > 0 );
		$this->assertTrue( sizeof($resultCount) == 1 );
		$this->assertTrue( sizeof($result) == $resultCount[0]['ct'] );
	}
}
