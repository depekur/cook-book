<?php 
class ToJson 
{
	public $list = array();
	public $stmt;

	public function __construct($stmt){
		$this->stmt = $stmt;
	}

	public function convert(){
		$this->stmt->setFetchMode(PDO::FETCH_ASSOC);
	
		while($row = $this->stmt->fetch()){
		    $list[] = $row;
		}
		
		return json_encode($list);
		
	}
}
?>