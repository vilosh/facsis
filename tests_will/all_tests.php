<?php

require_once('simpletest/autorun.php');

class AllTests extends TestSuite {
	function AllTests() {
		$this->TestSuite('All Tests');
		$this->addFile('Configuration.test.php');
		$this->addFile('Connection.test.php');
		$this->addFile('Query.test.php');
		$this->addFile('Model.test.php');
		$this->addFile('DatabaseModel.test.php');


	}
}
