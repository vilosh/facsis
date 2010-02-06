<?php
require_once('simpletest/autorun.php');

require_once('../public/bootstrap.php');

require_once('will/Configuration.class.php');
require_once('will/database/model/Model.class.php');

class TempModel extends Model {
	private $pessoas = array('jose', 'willian');
	public function getPessoas() {
		return $this->pessoas;
	}

	public function setPessoas(/* array */ $pessoas) {
		$this->pessoas = $pessoas;
	}
}

class ModelTest extends UnitTestCase {	
	function getConfiguration() {
		$config = Configuration::configuration();
		$config->setConfDb( array( 
			'host' => 'localhost', 
			'user' => 'willian', 
			'pass' => 'rancharia', 
			'dbname' => 'trazai_tests' ));
		return $config;

	}

	public function testModelGet() {
		$values = array( 'id' => 5, 'nome' => 'Willian' );
		$model = new Model( $values );
		$this->assertTrue( $model->nome == 'Willian');
	}

	public function testModelGetSet() {
		$values = array( 'id' => 5, 'nome' => 'Willian' );
		$model = new Model( $values );
		$this->assertTrue( $model->nome == 'Willian');
		$model->nome = 'Jose';
		$this->assertTrue( $model->nome == $model->getValue('nome') );
	}

	public function testModelMoreGet() {
		$values = array( 'id' => 5, 'nome' => 'Willian');
		$model = new TempModel($values);
		$this->assertTrue( $model->nome == 'Willian');
		$pessoas = $model->pessoas;
		$this->assertTrue( sizeof($pessoas) == 2);
		$this->assertTrue( $pessoas[0] == 'jose' );
	}

}
