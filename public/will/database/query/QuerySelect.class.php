<?php
require_once('will/database/query/Query.class.php');
require_once('will/database/query/Condition.class.php');

class QuerySelect extends Query{
	protected $table;
	protected $columns = array();
	protected $joins = array();
	protected $debug = 0;

	protected $condition = null;

	
	public function __construct( $table, $condition = null ) {
		$this->condition = $condition ? $condition : new Condition();
		$this->table = $table;		
	}
	
	public function addColumns( /* ... */ ) {
		$args = func_get_args();
       		for( $i=0, $n=count($args); $i<$n; $i++ ) {
			array_push( $this->columns, $args[$i] );
		}            
	}
	
	private function makeColumns() {
		$columns = '*';
		if( sizeof($this->columns) != 0) {
			$columns = '';
			foreach( $this->columns as $column ) 
				$columns = $columns . ', ' . $column;
			$columns = substr($columns, 2);
		}
		return $columns;
	}
	
	public function addJoin( $table, $condition ) {
		$join = array('table' => $table, 'on' => $condition);
		array_push( $this->joins, $join );
	}
	
	private function makeJoins() {
		$joins = '';
		if(sizeof($this->joins) != 0) {
			foreach($this->joins as $join ) {
				$joins = $joins . ' inner join ' . $join['table'] . ' on ' . $join['on'];
			}
		}
		return $joins;
		
	}
	
	public function addFilter( $condition ) {
		$this->condition->addFilter($condition);
	}
	
	private function filterSize() {
		return $this->condition->filterSize();
	}
	
	private function makeFilters() {
		return $this->condition->makeFilters();
	}

	public function limit( $limit ) {
		$this->condition->limit( $limit );
	}

	public function getLimit() {
		return $this->condition->getLimit();
	}

	public function orderBy( $order ) {
		$this->condition->orderBy($order);
	}

	public function getOrder( ) {
		return $this->condition->getOrder();
	}
	
	public function getString() {
		$columns = $this->makeColumns();
		$joins = $this->makeJoins();
		$filters = $this->makeFilters();
		$limit = $this->getLimit() ? " limit " . $this->getLimit() : "";
		$orderBy = $this->getOrder() ? " order by " . $this->getOrder() : "";
		
		$query = 'select ' . $columns . ' from ' . $this->table . $joins . ' ' . $filters . $orderBy . $limit;
		if($this->debug == 1)
			echo $query . '<br>';
		return $query;
	}
}
