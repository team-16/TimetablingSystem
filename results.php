<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirect('login.php');
}

?>

<html>

<script type='text/javascript' src='JSViews/results.js'></script>

<button type='button' onclick='testA();'>Test</button>

Results page

(submitted with pending)

</html>