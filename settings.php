<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirect('login.php');
}

?>

<html>

<link rel="stylesheet" type="text/css" href="CSS/settingsStyle.css">

	<div id='mainSettingsDiv'>
		
		<div class='accordion'>
			
			<label class='accordionSection'>
				<input type='radio' name='settingsAccordion' onclick='graphicalRadioToggle(this, 0);'>
					Change Password
				</input>
				
				<div class='accordionContent'>
					<div style='height:200px; width:100%;'>
						Change Password Content
					</div>
				</div>
				
			</label>
			
			<label class='accordionSection'>
				<input type='radio' name='settingsAccordion'>
					Modules
				</input>
				
				<div class='accordionContent'>
					<div style='height:200px; width:100%;'>
						Module Content
					</div>
				</div>
				
			</label>
			
		</div>
		
	</div>
	
</html>