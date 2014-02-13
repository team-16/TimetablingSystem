<?php

include('PHP/init.php');
if(authenticate($_POST["password"], $_POST["username"])){
	changePassword($_POST["username"], $_POST["newPassword"]);
	
	echo('<form id="autoForm" method="post" action="settings.php">
    <input type="hidden" name="errorCode" value="success">
    <input type="submit">
	</form>
	<script type="text/javascript">
    document.getElementById("autoForm").submit();
	</script>
	');
	
}

else{
	
	echo('<form id="autoForm" method="post" action="settings.php">
    <input type="hidden" name="errorCode" value="invalid">
    <input type="submit">
	</form>
	<script type="text/javascript">
    document.getElementById("autoForm").submit();
	</script>
	');
	
}

?>