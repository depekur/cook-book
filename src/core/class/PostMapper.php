<?php 
class PostMapper extends Mapper 
{
	public function selectAll() {

		$sth = $this->dbh->prepare("SELECT * FROM chat");
		$sth->execute();
		return $sth;
	}
}

?>