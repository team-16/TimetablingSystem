<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>

<head>

<style type='text/css'>
@charset "UTF-8";

#historyViewContainer {
	position:relative;
	top:40px;
	left:calc(50% - 480px);
	height:auto;
	width:940px;
	
	margin-top:10px;
	
	border:1px solid #bbb;
}


</style>


</head>
	
<div id='historyViewContainer'>
	No History
</div>

<script type='text/javascript' src='JSViews/historyScript.js'></script>

</html>
