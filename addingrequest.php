<?php

// NEEDS UPDATING - DOES NOT WORK YET

include('PHP/init.php');
if(insertRequest($moduleCode, $priority, $day, $startPeriod, $endPeriod,
 $weeks, $noOfStudents, $parkPreference, $traditional, $sessionType, $noOfRooms,
 $roomCode, $otherRequirements, $roundID, $status));
	
	echo('<form id="autoForm" method="post" action="requests.php">
    <input type="hidden" name="errorCode" value="success">
    <input type="submit">
	</form>
	<script type="text/javascript">
    document.getElementById("autoForm").submit();
	</script>
	');
	
}

else{
	
	echo('<form id="autoForm" method="post" action="add.php">
    <input type="hidden" name="errorCode" value="invalid">
    <input type="submit">
	</form>
	<script type="text/javascript">
    document.getElementById("autoForm").submit();
	</script>
	');
	
}

?>