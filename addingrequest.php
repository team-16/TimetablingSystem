<?php

include('PHP/init.php');

if(insertRequest($_POST['moduleCode'], $_POST['priority'], $_POST['day'], $_POST['startPeriod'], $_POST['endPeriod'],
 $_POST['weeks'], $_POST['noOfStudents'], $_POST['parkPreference'], $_POST['traditional'], $_POST['sessionType'], $_POST['noOfRooms'],
 $_POST['roomCode'], $_POST['otherRequirements'], $_POST['roundID'], json_decode($_POST['facilityID']))){
	
	/*echo('<form id="autoForm" method="post" action="requests.php">
    <input type="hidden" name="errorCode" value="success">
    <input type="submit">
	</form>
	<script type="text/javascript">
    document.getElementById("autoForm").submit();
	</script>
	');*/
	//echo("Great success!");
}

else{
	
	/*echo('<form id="autoForm" method="post" action="add.php">
    <input type="hidden" name="errorCode" value="invalid">
    <input type="submit">
	</form>
	<script type="text/javascript">
    document.getElementById("autoForm").submit();
	</script>
	');	
}*/
	//echo("Failed.");
}

?>