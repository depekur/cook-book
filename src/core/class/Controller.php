<?php
class Controller 
{
	public $dbh;

	public function __construct($d) {
		$this->dbh = $d;
	}

	public function selectAll() {

		$sth = $this->dbh->prepare("SELECT * FROM chat");
		$sth->execute();
		return $sth;
	}
}
?>