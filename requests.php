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

#requestsViewContainer {
	position:relative;
	top:40px;
	left:calc(50% - 480px);
	height:auto;
	width:950px;
	
	margin-top:10px;
	
	border:1px solid #bbb;
}


</style>


</head>

<input type='button' onclick='loadListView();'>List View</input>
<input type='button' onclick='loadTimetableView();'>Timetable View</input>
	
<div id='requestsViewContainer'>
	
</div>

<script type='text/javascript' src='JSViews/requestsScript.js'></script>

</html>
