/*When index.html is loaded and ready */
$(document).ready(function() {
		
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
	
	//Need to move with files after User Authentication
	//setupSessionData();
	loadSess();
	
});

function loadSess() {
	alert("sommin");
	
	var currentSessionID = document.location.href.match(/PHPSESSID=[^;]+/);
	
	$.ajax({
		url: "PHP/loadSessionData.php?" +currentSessionID,
		type: "GET",
		datatype: "json",
		data: {},
		success: function(results) {
			alert(JSON.stringify(results));
			sessionDataSetup(results);
		}
	});
		
	//alert("sommin2");
	
};

$(function() {
			var d = new Date();
			$( "#progressbar" ).progressbar({
				value: 70
				
				//value: d.getTime() - roundStart.getTime() / roundEnd.getTime() - roundStart.getTime()

			});
			if($( "#progressbar" ).progressbar("value") < 60) $("#progressbar").addClass('beginning');
			else if ($( "#progressbar" ).progressbar("value") < 90) $("#progressbar").addClass('middle');
            else $("#progressbar").addClass('end');

});
