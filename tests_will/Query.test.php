<?php
require_once('simpletest/autorun.php');

require_once('../public/bootstrap.php');

require_once('will/Configuration.class.php');
require_once('will/database/query/Query.class.php');
require_once('will/database/query/QuerySelect.class.php');

class QuerySelectTest extends UnitTestCase {
	function getConfiguration() {
		$config = Configuration::configuration();
		$config->setConfDb( array( 
			'host' => 'localhost', 
			'user' => 'willian', 
			'pass' => 'rancharia', 
			'dbname' => 'trazai_tests' ));
		return $config;

	}

	function testSingleSelect() {
		$queryStr = "select * from connection_tests ct";
		$query = new QuerySelect("connection_tests ct");

		$connection = $this->getConfiguration()->getConnection();

		$resultStr = $connection->run( $queryStr );
		$result = $connection->run( $query );

		$this->assertTrue( $result != null);
		$this->assertTrue( sizeof($result) == sizeof( $resultStr ));
		$this->assertTrue( $result[0]['value'] == $resultStr[0]['value']);


		$result = $query->run();
		$this->assertTrue( $result != null);
		$this->assertTrue( sizeof($result) == sizeof( $resultStr ));
		$this->assertTrue( $result[0]['value'] == $resultStr[0]['value']);

	}

	function testFilter() {
		$query = new QuerySelect("connection_tests ct");
		$query->addFilter("ct.id = 2");

		$result = $query->run();
		$this->assertTrue( sizeof($result) == 1 );
		$this->assertTrue( $result[0]['value'] == 'two' );
	}

	function testLimit() {
		$query = new QuerySelect("connection_tests ct");
		$query->limit(2);

		$result = $query->run();
		$this->assertTrue( sizeof($result) > 0 );
		$this->assertTrue( sizeof($result) <= 2 );

	}

	function testOrderBy() {
		$query = new QuerySelect("connection_tests ct");
		$query->OrderBy('id desc');

		$result = $query->run();
		$this->assertTrue( sizeof($result) >= 2);
		$this->assertTrue( $result[0]['id'] > $result[1]['id'] );
	}

}
