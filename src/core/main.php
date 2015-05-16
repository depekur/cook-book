<?php
require ('bootstrap.php');

// input
// output
//


try {

	$data = Base::getConnection();

	$ctrl = new PostMapper($data);

	$stmt = $ctrl->selectAll();

	$json = new ToJson($stmt);
	$json = $json->convert();

	echo $json;

	
} catch (PDOException $e) { 
	echo $e->getMessage();
} 


?>