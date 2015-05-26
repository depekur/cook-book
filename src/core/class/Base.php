<?php
//singleton PDO connect class 


class Base
{
	static private $_db = null; 

	private function __construct() {} 
	private function __clone() {} 

	static public function getConnection()
	{
		$config = parse_ini_file("config.ini");

		if (self::$_db == null) { 

			try {
				self::$_db = new PDO($config['base']);
				self::$_db -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				self::$_db -> setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
				self::$_db -> setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'STRICT_ALL_TABLES');
			} 
			catch (PDOException $e) { 
				echo $e->getMessage();
			} 

		return self::$_db;
		} else { 
		return self::$_db;
		} 
	} 
} 


?>