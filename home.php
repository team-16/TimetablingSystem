<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>
<head>
	<script type="text/javascript">
		function myRequestsValues (requests) {
		var acceptedValue= 0;
		var rejectedValue= 0;
		var pendingValue = 0;
			for (var i = 0; i < requests.length; i++) {
				if(requests[i].status == 0){
					acceptedValue++;
				} else if (requests[i].status == 1){
					rejectedValue++;
				} else pendingValue++;
			}
			$("#accepted").html(acceptedValue);
			$("#rejected").hmtl(rejectedValue);
			$("#pending").html(pendingValue);
		}
	</script>
</head>
<button type='button' onclick='$("#requestsNow").click();'>Redirect</button>
<div>
	<h2>Welcome: <?php echo(loggedDept() . " | " . loggedDeptName()); ?> </h2> 	
</div>
<div id = "request_results" style = "width:30%;">
	<table class="CSSTableGenerator">
		<tr>
			<td>accepted</td><td>rejected</td><td>pending</td>
		</tr>
		<tr>
			<td id="accepted">0</td><td id="rejected">0</td><td id="pending">0</td>
		</tr>
	</table>
</div>

</html>