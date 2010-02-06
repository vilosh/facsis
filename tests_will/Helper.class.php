<?php

require_once('will/database/model/DatabaseModel.class.php');
require_once('will/database/model/Table.class.php');

require_once('will/database/query/Condition.class.php');

class Pessoa extends DatabaseModel {
	public function getTelefones() {
		$condition = new Condition();
		$condition->addFilter("pessoa_id = '" . $this->id . "'");
		
		$telefoneTable = new TelefoneTable();

		$telefones = $telefoneTable->get($condition);

		return $telefones;
	}
}

class PessoaTable extends Table {
	protected $tableName = "Pessoa";
	protected $indexColumn = "id";
	protected $modelClass = "Pessoa";
}

class TelefoneTable extends Table {
	protected $tableName = "Telefone";
	protected $indexColumn = "id";
	protected $modelClass = "Telefone";
}

class Telefone extends DatabaseModel {	
}

