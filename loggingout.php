<?php

include('PHP/init.php');

	session_destroy();
	
	echo('<form id="autoForm" method="post" action="login.php">
    <input type="hidden" name="errorCode" value="logout">
    <input type="submit">
	</form>
	<script type="text/javascript">
    document.getElementById("autoForm").submit();
	</script>
	');
	
}

?>