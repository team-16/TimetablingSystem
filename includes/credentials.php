<?php

function login($deptCode, $password){

	if(checkInfo($deptCode, $password)){
		$_SESSION['DepartmentCode'] = $deptCode;
		return true;	
	}

	return false;
}

function logout(){
	session_destroy();
}

function isLoggedIn(){
	return isset($_SESSION['DepartmentCode']);
}

function loggedDept(){
	return $_SESSION['DepartmentCode'];
}

function changePassword($deptCode, $newPassword){
	global $DB;
	
	$salt = generatePwdSalt();
	$hash = generatePwdHash($newPassword, $salt);
	
	if($DB->query("UPDATE Department SET PasswordHash = :hash, PasswordSalt = :salt WHERE DepartmentCode = :department", array(':hash' => $hash,':salt' => $salt,':department' => $deptCode))){
		return true;
	}
	
	else{
		return false;
	}
}

function generatePwdSalt(){
	return uniqid();
}

function generatePwdHash($password, $salt){
	return hash('sha256', $password . $salt);
}

function checkInfo($deptCode, $password){
	global $DB;
	
	if($DB->query("SELECT PasswordHash, PasswordSalt FROM Department WHERE DepartmentCode = :code", array(':code' => $deptCode))){
		$pwdHash = generatePwdHash($password, $department['PasswordSalt']);
		$department = $DB->resultsZero();
			
		if($pwdHash === $department['PasswordHash']){
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