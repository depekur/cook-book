<?php
require ('bootstrap.php');

/*
try {
	$DBH = new PDO("sqlite2:db/k"); 
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

	$sth = $DBH->prepare("SELECT * FROM chat");
	$sth->execute();

	$sth->fetch(PDO::FETCH_ASSOC);

	while ($array = $sth->fetch(PDO::FETCH_ASSOC)){ 

	} 
catch (PDOException $e) { 
	echo $e->getMessage();
} 
*/

try {

	$data = Base::getConnection();
	$ctrl = new Controller($data);
	$lol = $ctrl->selectAll();
	//var_dump($ctrl);
	$lol->setFetchMode(PDO::FETCH_ASSOC);
	
	while($row = $lol->fetch()) {  
	    echo $row['id'] . "\n";  
	    echo $row['time'] . "\n";  
	    echo $row['massage'] . "\n <br>";  
	}

	
} catch (PDOException $e) { 
	echo $e->getMessage();
} 


?>