<html>

<?php

include('PHP/init.php');

?>

<head>
<script type='text/javascript' src='jQuery&UI/jQuery.js'></script>
<script type='text/javascript' src='jQuery&UI/jquery-ui-1.10.3/ui/jquery-ui.js'></script>
<script type="text/javascript">
function testfunc(){
	var test1 = JSON.stringify(<?php echo(getModules("CO")); ?>);
	alert(test1);
	//document.getElementById('myResults').innerHTML = test1;
}
</script>

</head>
<body>
	<button type="button" onclick="testfunc();">Get PHP function return value and alert</button>
	<br /><br />
	<!--<div id="myResults"></div>
	<br /><br />-->


<?php

//$results = getModules(NULL);
//$results = "topkek";

//print_r($results);

echo("<br /><br />");

//print_r(json_encode($results));

//echo("// Testing Login Script...  ");

//change this to test login. this should fail if you change the password.
login("BS", "password");

// change password
changePassword("BS", "password");
changePassword("CG", "password");
changePassword("CM", "password");
changePassword("CO", "password");
changePassword("CV", "password");
changePassword("DS", "password");
changePassword("EA", "password");
changePassword("EC", "password");
changePassword("EL", "password");
changePassword("EU", "password");
changePassword("GY", "password");
changePassword("IS", "password");
changePassword("MA", "password");
changePassword("MM", "password");
changePassword("MP", "password");
changePassword("PH", "password");
changePassword("PS", "password");
changePassword("SA", "password");
changePassword("SS", "password");
changePassword("TT", "password");

// check new password works
login("BS", "password");

echo("<br /><br />");

phpinfo();

?>

</body>
</html>