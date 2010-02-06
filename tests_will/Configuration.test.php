<?php
require_once('simpletest/autorun.php');

require_once('../public/bootstrap.php');

require_once('will/Configuration.class.php');

class ConfigurationTest extends UnitTestCase {

	function getConfiguration() {
		$config = Configuration::configuration();
		$config->setConfDb( array( 'host' => 'localhost', 'user' => 'willian', 'pass' => 'rancharia', 'dbname' => 'trazai_tests' ));
		return $config;

	}

	function testConfigurationInstance() {
		$config = Configuration::configuration();
		$this->assertTrue( $config != null );
		$c2 = Configuration::configuration();
		$this->assertTrue( $config == $c2 );
	}

	function testConfigurationConfDb() {
		$config = Configuration::Configuration();
		

		$config->setConfDb( array( 'host' => 'localhost', 'user' => 'willian', 'pass' => 'rancharia', 'dbname' => 'trazai_tests' ));
		$confDb = $config->getConfDb();
		$this->assertTrue( $confDb['dbname'] == 'trazai_tests' );

	}

	function testConfigurationGetConnection() {

		$config = $this->getConfiguration();
		$connection = $config->getConnection();
		$this->assertTrue( $connection != null );

	}
}

?>

