/*When index.html is loaded and ready */
$(document).ready(function() {
	
	/* Initial Load - load homepage */ /* Need to validate for redirection to login page*/
	$('#ContentDiv').load('home.html');	
	
	/* Handels on-click of menu buttons - block coding */
	$('nav a').click(function(){
		
		/* Getting the linked page */
		var toLoad = $(this).attr('href');		
		
		/* Hiding content and calling loadContent function - creates animation*/
		$('#ContentDiv').hide('slow', loadContent);
		
		/* Injects content to ContentDiv div tag */
		function loadContent(){
			$('#ContentDiv').load(toLoad, '', showNewContent);
		}
		
		/* Shows content div */
		function showNewContent() {
			$('#ContentDiv').show('normal');
		}
		
		/* In order to stop the browser actually navigating to the page, false is returned */
		return false;
		
	});
	
	//Need to move with files after User Authentication
	setupSessionData();
	
});