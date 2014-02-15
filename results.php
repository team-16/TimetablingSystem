<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>

<script type='text/javascript' src='JSViews/results.js'></script>

<button type='button' onclick='testA();'>Test</button>

Results page

(submitted with pending)

</html>