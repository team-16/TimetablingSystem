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

function testX() {
	alert("1");
	
	var res = <?php include("PHP/init.php"); echo getModules("CO"); ?> ;
	
	alert("2");
	
	alert( JSON.stringify(res));
	
}


</script>

<button type='button' onclick='testX();'>Some Test</button>



</html>