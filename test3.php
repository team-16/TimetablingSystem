<html>


<style type='text/css'>
@charset "UTF-8";

#viewContainer {
	position:relative;
	top:40px;
	left:calc(50% - 480px);
	height:auto;
	width:940px;
	
	margin-top:10px;
	
	border:1px solid #bbb;
}


</style>


<script type='text/javascript'>



</script>

<input type='radio' name='resultsRadio' onclick='' checked>Current</input>
<input type='radio' name='resultsRadio' onclick=''>AdHoc View</input>

<input type='button' onclick='loadListView();'>List View</input>
<input type='button' onclick='loadTimetableView();'>Timetable View</input>

<div id='viewContainer'>
	
</div>



<script type='text/javascript' src='JSViews/test3.js'></script>

</html>