<?php

class Connection {
	private $confDb;
	private $connection;

	public function __construct( $confDb ) {
		$this->confDb = $confDb;
	}

	private function open() {
		$confDb = $this->confDb;
		$this->connection = mysql_connect( $confDb['host'], $confDb['user'], $confDb['pass']);
		mysql_set_charset('utf8', $this->connection);
		mysql_select_db( $confDb['dbname'] );
	}

	private function close() {
		mysql_close( $this->connection );
	}

	public function run($query) {
		$this->open();
		$result = mysql_query( $query, $this->connection);
		$this->close();
		return $this->resultInArray( $result );
	}

	private function resultInArray( $result ) {
		$rows = array();
		if( $result ) {
			while( $row = mysql_fetch_assoc( $result ))
				array_push($rows, $row);
		}
		return $rows;
	}
}

