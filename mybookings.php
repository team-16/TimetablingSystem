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

#myBookingsViewContainer {
	position:relative;
	top:40px;
	left:calc(50% - 480px);
	height:auto;
	width:950px;
	
	margin-top:10px;
	
	border:1px solid #bbb;
}


</style>


<input type='radio' name='myBookingsRadio' onclick='adHocState(this);' checked>Current</input>
<input type='radio' name='myBookingsRadio' onclick='adHocState(this);' id='adHocRad'>AdHoc View</input>

<input type='button' onclick='loadListView();'>List View</input>
<input type='button' onclick='loadTimetableView();'>Timetable View</input>



<div id='myBookingsViewContainer'>
	No Bookings
</div>

<script type='text/javascript' src='JSViews/mybookingsScript.js'></script>

</html>