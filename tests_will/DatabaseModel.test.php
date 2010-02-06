<?php
require_once('simpletest/autorun.php');

require_once('../public/bootstrap.php');

require_once('will/Configuration.class.php');
require_once('will/database/model/DatabaseModel.class.php');
require_once('./Helper.class.php');

class DatabaseModelTest extends UnitTestCase {	
	function getConfiguration() {
		$config = Configuration::configuration();
		$config->setConfDb( array( 
			'host' => 'localhost', 
			'user' => 'willian', 
			'pass' => 'rancharia', 
			'dbname' => 'trazai_tests' ));
		return $config;
	}

	function testDatabaseModelById() {
		$this->getConfiguration();
		$pessoaTable = new PessoaTable();
		$pessoa = $pessoaTable->getById(1);
		$this->assertTrue( $pessoa != null );
		$this->assertTrue( $pessoa->sexo == 'M');
		$this->assertTrue( $pessoa->nome == 'Willian Gigliotti');
	}

	function testDatabaseModelRelation() {
		$this->getConfiguration();
		$pessoaTable = new PessoaTable();
		$pessoa = $pessoaTable->getById(2);

		$this->assertTrue( $pessoa != null );
		$telefones = $pessoa->getTelefones();

		$this->assertTrue( $telefones != null );
		$this->assertTrue( sizeof($telefones) == 1);
		print_r($telefones);
		$tel = $telefone[0];
		echo '[' . $tel->telefone . ']';
		$this->assertTrue( $telefone[0]->telefone == '(11) 26287116');
	}
}
