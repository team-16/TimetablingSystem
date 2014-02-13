<?php

function login($deptCode, $password){
	//echo("Logging In...");

	if(authenticate($password, $deptCode)){

		$_SESSION['code'] = $deptCode;
		//echo("Logged in correctly");
		return true;
	}
	else{
		//echo("NOT logged in correctly!!!");
		return false;
	}
}

function logout(){
	session_destroy();
}

function isLoggedIn(){
	return isset($_SESSION['code']);
}

function loggedDept(){
	return $_SESSION['code'];
}

function loggedDeptName(){
	global $DB;
	
	if($DB->query("SELECT name FROM department WHERE code ='" . $_SESSION['code'] . "'")){
		$ret =  $DB->resultsZero();
		return $ret[0]['name'];
	}
	
	else{
		return false;
	}
}

function changePassword($deptCode, $newPassword){
	global $DB;
	
	$salt = generatePwdSalt();
	$hash = generatePwdHash($newPassword, $salt);
	
	if($DB->query("UPDATE department SET hash = :hash, salt = :salt WHERE code = :department", array(':salt' => $salt,':hash' => $hash,':department' => $deptCode))){
		echo("woop");
		return true;
	}
	
	else{
		echo("NOPE");
		return false;
	}
}

function generatePwdSalt(){
	return uniqid(mt_rand(), true);
}

function generatePwdHash($password, $salt){
	$passSalt = $password . $salt;
	return hash('sha256', $passSalt);
}

function authenticate($password, $deptCode){
	global $DB;
	
	if($DB->query("SELECT hash, salt FROM department WHERE code = :code", array(':code' => $deptCode))){
		$department = $DB->resultsZero();

		if(generatePwdHash($password, $department['salt']) === $department['hash']){
			return true;
		}
		
		else{
			return false;
		}
	}
	
	else{
		return false;
	}
}

?>