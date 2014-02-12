<html>

<?php

include('PHP/init.php');

?>

<head>
<script type='text/javascript' src='jQuery&UI/jQuery.js'></script>
<script type='text/javascript' src='jQuery&UI/jquery-ui-1.10.3/ui/jquery-ui.js'></script>
<script type="text/javascript">
function testfunc(){
	<?php login("BS", "password"); ?>;
	alert("Logged in as BS!");
}
</script>

</head>
<body>
	<button type="button" onclick="testfunc();">Login!</button>
	<br /><br />

</body>
</html>