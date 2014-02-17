<?php

// credentials.php

// CREATED BY:
// Niall Rose

// FUNCTIONALITY:
// Holds functions related to logging in, managing sessions and logging out.

function login($deptCode, $password){
// Check details against database, then if correct, create session/login.

	if(authenticate($password, $deptCode)){

		$_SESSION['code'] = $deptCode;
		return true;
	}
	else{
		return false;
	}
}

function logout(){ // Remove session data, forcing logout.
	session_destroy();
}

function isLoggedIn(){ // Checks for a logged in department.
	return isset($_SESSION['code']);
}

function loggedDept(){ // Returns currently logged in department's code.
	return $_SESSION['code'];
}

function loggedDeptName(){ // Returns currently logged in department's name.
	global $DB;
	
	if($DB->query("SELECT name FROM department 
	WHERE code ='" . $_SESSION['code'] . "'")){
		$ret =  $DB->resultsZero();
		return $ret['name'];
	}
	
	else{
		return false;
	}
}

function changePassword($deptCode, $newPassword){ //Change dept's login password
	global $DB;
	
	$salt = generatePwdSalt();
	$hash = generatePwdHash($newPassword, $salt);
	
	if($DB->query("UPDATE department SET hash = :hash, salt = :salt WHERE code =
	:department", array(
	':salt' => $salt,':hash' => $hash,':department' => $deptCode))){
		return true;
	}
	
	else{
		return false;
	}
}

function generatePwdSalt(){ // Create random password salt for security.
	return uniqid(mt_rand(), true);
}

function generatePwdHash($password, $salt){
// Generate password hash via the sha256 algorithm.

	$passSalt = $password . $salt;
	return hash('sha256', $passSalt);
}

function authenticate($password, $deptCode){ // Check login details are valid.
	global $DB;
	
	if($DB->query("SELECT hash, salt FROM department WHERE code = :code", array(
	':code' => $deptCode))){
		$department = $DB->resultsZero();

		if(
		generatePwdHash($password, $department['salt']) === $department['hash'])
		{
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