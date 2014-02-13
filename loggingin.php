<?php

include('PHP/init.php');
if(authenticate($_POST["password"], $_POST["username"])){
	login($_POST["username"], $_POST["password"]);
	
	redirect("index.php");
}

else{

	session_destroy();
	
	echo('<form id="autoForm" method="post" action="login.php">
    <input type="hidden" name="errorCode" value="invalid">
    <input type="submit">
	</form>
	<script type="text/javascript">
    document.getElementById("autoForm").submit();
	</script>
	');
	
	//redirect('login.php');
	
}

?>