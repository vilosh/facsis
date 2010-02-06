<?php

class Condition {
	protected $filters = array();
	protected $orderBy = null;
	protected $limit = null;
	
	public function addFilter( $condition ) {
		array_push( $this->filters, $condition );
	}
	
	public function filterSize() {
		return sizeof($this->filters);
	}
	
	public function makeFilters() {
		$filters = '';
		if(sizeof($this->filters) != 0) {
			foreach($this->filters as $filter) {
				$filters = $filters. ' and ( ' . $filter . ' ) ';
				
			}
			$filters = 'where' . substr($filters, 4);			
		}
		return $filters;
	}

	public function limit( $limit ) {
		$this->limit = $limit;
	}

	public function getLimit() {
		return $this->limit;
	}

	public function getOrder() {
		return $this->orderBy;
	}

	public function orderBy( $order ) {
		$this->orderBy = $order;
	}
}
