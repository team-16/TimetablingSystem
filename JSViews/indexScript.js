/*When index.html is loaded and ready */
$(document).ready(function() {
	
	//Load session data on System start after authentication of user
	loadSession();
	
	/* Handels on-click of menu buttons - block coding */
	$('#menuLinks a').click(function(){
		
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
	
	/* Initial Load - load homepage by simulation of clicking on home*/ /* Need to validate for redirection to login page*/
	$('#home').click();
	
	loadProgressBar();
	
});

function loadProgressBar() {
			//alert(roundStart.getTime());
			
			$( "#progressbar" ).progressbar({
				
				max: 100,
				
				value: getCurrentRoundPercentage()

			});
			$('#progressbar').height(15);
			if($( "#progressbar" ).progressbar("value") < 60) $("#progressbar").addClass('beginning');
			else if ($( "#progressbar" ).progressbar("value") < 90) $("#progressbar").addClass('middle');
            else $("#progressbar").addClass('end');

};