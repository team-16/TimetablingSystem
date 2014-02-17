<?php

// Database.class.php

// CREATED BY:
// Niall Rose

// FUNCTIONALITY:
// Stores information related to connecting to the database. Also creates a PDO
// (PHP Data Object) to act as the middle man between the database and the user.
// There is also a query function, which is used heavily throughout the system.

class Database {
	
	private $DBH; //variable for PHP Data Object to get results
	private $results; //Holds results
	
	public function __construct(){ // Setup database for system use.
		try {
			$dbSettings = array( // Stores database info.
				'host'		=> 'localhost',
				'username'	=> 'team16',
				'password'	=> 'mpy34awd',
				'dbname'	=> 'team16'
			);
			
			$this->DBH = new PDO('mysql:host=' . $dbSettings["host"] . 
			';dbname=' . $dbSettings["dbname"], $dbSettings["username"], 
			$dbSettings["password"]);
		$this->DBH->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
		
		catch(PDOException $e){ // Catch errors
			die($e->getMessage());
		}
	}
	
	public function query($SQL, $parameters = array()){
	// Send query to database and store result(s).
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
	
	public function results(){ // Return results of query to database.
		return $this->results;
	}
	
	public function resultsZero(){ // Return 1st result of query to database.
		return $this->results[0];
	}
	
	public function lastInsertId(){ // Return last insert id of database.
		return $this->DBH->lastInsertId();
	}
	
}

?>