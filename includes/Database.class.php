<?php

class Database {
	
	private $DBH; //variable for PHP Data Object to get results
	private $results; //Holds results
	
	public function __construct(){
		try {
			$dbSettings = array(
				'host'		=> 'localhost',
				'username'	=> 'team16',
				'password'	=> 'mpy34awd',
				'dbname'	=> 'team16'
			);
			
			$this->DBH = new PDO('mysql:host=' . $dbSettings["host"] . ';dbname=' . $dbSettings["dbname"], $dbSettings["username"], $dbSettings["password"]);
			$this->DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
		
		catch(PDOException $e){
			die($e->getMessage());
		}
	}
	
	public function query($SQL, $parameters = array()){
		$statementHandler = $this->DBH->prepare($SQL);
		
		if($statementHandler){
		
			if($statementHandler->execute($parameters)){
				$this->results = $statementHandler->fetchAll();
				return true;
			}
		}
		
		print_r($statementHandler->errorInfo());
		return false;
	}
	
	public function results(){
		return $this->results;
	}
	
	public function resultsZero(){
		return $this->results[0];
	}
	
	//public function resultsOne(){
	//	return $this->results[1];
	//}
	
	//public function resultsTwo(){
	//	return $this->results[2];
	//}
}

?>