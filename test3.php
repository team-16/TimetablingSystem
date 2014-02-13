<html>


<style type='text/css'>
@charset "UTF-8";
.listTest
{
	position:relative;
	top:40px;
	left:10px;
	height:auto;
	width:940px;
	
	margin-top:10px;
	
	border:1px solid #bbb;

}

</style>


<script type='text/javascript'>

function testX(dept) {
	alert("1");
	dept = "CO";
	
	window.location = "?dept=" + "CO";
	
	var res = <?php 
		$dept = $_GET['dept'];
		include("PHP/init.php"); echo getModules($dept); 
	?> ;
	
	
	
	alert("2");
	
	alert( JSON.stringify(res));
	
}


</script>

<button type='button' onclick='testX("CO");'>Some Test</button>
<button type='button' onclick='testX("TT");'>Some Test2</button>



</html>