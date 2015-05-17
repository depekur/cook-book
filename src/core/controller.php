<?php
require ('bootstrap.php');
//require ('Slim/Slim.php');

// input
// output
// класс контроллер с методами проверки че ваще пришло
// в приемнике свич с перебором, и обращением к методам контроллера
// который обращается к мапперу
// маппер взаимодействует с моделью и базой, отдает контроллеру 
// контроллер посылает на фронтенд 



$app = new \Slim\Slim();
$app -> get('/', function () {

	try {

		$data = Base::getConnection();

		$ctrl = new PostMapper($data);

		$ctrl = $ctrl->selectAll();

		$json = new ToJson($ctrl);
		$json = $json->convert();

		echo $json;

	
	}catch (PDOException $e) { echo $e->getMessage();}


}); 


$app->response()->header("Content-Type", "application/json");
echo $json;
 
$app -> run();

?>