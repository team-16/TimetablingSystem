<html>


<style type='text/css'>

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


<script type='text/javascript' src='JS/weeksManipulator.js'></script>

<script type='text/javascript'>

function testX(){
	var results = "<?php echo getModules(NULL); ?>";
	getModules(results);
}


</script>

<button type='button' onclick='testX();'>Some Test</button>



</html>