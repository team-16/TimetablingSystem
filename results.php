<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>

<button type='button' onclick='testA();'>Test</button>




<script type='text/javascript' src='JSViews/resultsScript.js'></script>

</html>