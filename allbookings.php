<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>

<style type='text/css'>
@charset "UTF-8";

#allBookingsViewContainer {
	position:relative;
	top:40px;
	left:calc(50% - 480px);
	height:auto;
	width:950px;
	
	margin-top:10px;
	
	border:1px solid #bbb;
}


</style>


<input type='radio' name='allBookingsRadio' onclick='adHocState(this);' checked>Current</input>
<input type='radio' name='allBookingsRadio' onclick='adHocState(this);' id='adHocRad'>AdHoc View</input>

<input type='button' onclick='loadListView();'>List View</input>
<input type='button' onclick='loadTimetableView();'>Timetable View</input>

<div id='allBookingsViewContainer'>
	
</div>

<script type='text/javascript' src='JSViews/allbookingsScript.js'></script>

</html>