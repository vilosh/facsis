<?php
require_once('will/database/Connection.class.php');
require_once('will/database/model/DatabaseModel.class.php');
require_once('will/database/query/QuerySelect.class.php');

abstract class Table {
	protected $tableName;
	protected $indexColumn;
	protected $modelClass;
	public function getById($id) {
		$query = new QuerySelect( $this->tableName );
		$query->addFilter($this->indexColumn . "= '" . $id . "'");
		$result = $query->run();
		if(sizeof($result) == 0)
			return null;
		return new $this->modelClass($result[0]);
	}

	public function get($condition) {
		$query = new QuerySelect( $this->tableName, $condition);
		return $this->arraysToModels( $query->run());
	}

	private function arraysToModels( $arrays ) {
		if($arrays == null)
			return null;

		$models = array();
		foreach($arrays as $row) {
			array_push($models, new $this->modelClass($row));
		}
		return $models;
		

	}


	public function getModelClass() {
		return $this->modelClass; 
	}
}
