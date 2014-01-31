<?php

class Database {
	
	private $DBH; //variable for PHP Data Object to get results
	private $results; //Holds results
	
	public function __construct(){
		try {
			$DBH = new PDO('mysql:host=' . $GLOBALS['config']['database']['host'] . ';dbname=' . $GLOBALS['config']['database']['dbname'], $GLOBALS['config']['database']['username'], $GLOBALS['config']['database']['password']);
			$DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
		
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	
	public function query($SQL, $parameters = array()){
		$statementHandler = $DBH->prepare($SQL);
		
		if($statementHandler){
		
			if($statementHandler->execute($parameters)){
				$DBH = $statementHandler->fetchAll();
				return true;
			}
		}
		
		print_r($statementHandler->errorInfo());
		return false;
	}
	
	public function results(){
		return $results;
	}
	
	public function resultsZero(){
		return $results[0];
	}
}

?>