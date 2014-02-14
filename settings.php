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
			
			<label class='accordionSection settingsCard'>
				<input type='radio' name='settingsAccordion' onclick='settingsRadioToggle(this, 0);'>
					Modules
				</input>
				
				<div class='accordionContent settingsContent'>
					<div style='height:200px; width:100%;'>
						Module Content
					</div>
				</div>
				
			</label>
			
			<label class='accordionSection settingsCard'>
				<input type='radio' name='settingsAccordion' onclick='settingsRadioToggle(this, 0);'>
					Change Password
				</input>
				
				<div class='accordionContent settingsContent' onclick='return false;'>
					
					<table class='ChangePasswordTable'>
						
						<tr>
							<td class='PasswordTitle'>
								Current Password:
							</td>
							<td>
								<input type='password' id='oldpassword'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								New Password:
							</td>
							<td>
								<input type='password' id='newpassword'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Confirm New Password:
							</td>
							<td>
								<input type='password' id='confirmnewpassword'></input>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td style='text-align:right;'>
								<input type='button' value='Change Password' onclick='changePassword();'></input>
							</td>
						</tr>
						
					</table>
					
				</div>
				
			</label>
			
		</div>
		
	</div>


<script type='text/javascript' src='JSViews/settings.js'></script>

</html>