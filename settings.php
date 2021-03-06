<?php

// Niall: edit insertRoom to encorporate inserting new facilities correctly.
// Add editBuildings - copypasta editRoom basically with minor changes.

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
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
				
				<div class='accordionContent settingsContent' onclick='return false;'>
					<table class='insertModuleTable'>
						
						<tr>
							<td>
								Module Code:
							</td>
							<td>
								<input type='text' id='modulecode'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Department Code:
							</td>
							<td>
								<input type='text' id='deptcode'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Module Title:
							</td>
							<td>
								<input type='text' id='moduletitle'></input>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td style='text-align:right;'>
								<input type='button' value='Insert New Module' onclick='insertModule();'></input>
							</td>
						</tr>
						
					</table>
				</div>
				
			</label>
			
			<label class='accordionSection settingsCard'>
				<input type='radio' name='settingsAccordion' onclick='settingsRadioToggle(this, 0);'>
					Rooms
				</input>
				
				<div class='accordionContent settingsContent' onclick='return false;'>
				<table class='roomsTable'>
				<tr>
				<td>
					<table class='insertRoomTable'>
						
						<tr>
							<td>
								Room Code:
							</td>
							<td>
								<input type='text' id='roomInsertRoomcode'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Building Code:
							</td>
							<td>
								<input type='text' id='room_insert_buildingcode'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Type:
							</td>
							<td>
								<input type='text' id='room_insert_roomtype'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Capacity:
							</td>
							<td>
								<input type='text' id='room_insert_roomcapacity'></input>
							</td>
						</tr>
						<tr>
						<td>
							<!--<div id="roomFacilities" class="facilitiesDiv">-->
							<!-- content -->
							<!--</div>-->
						</td>
						</tr>
						
						<tr>
							<td></td>
							<td style='text-align:right;'>
								<input type='button' value='Insert New Room' onclick='alertRoom();'></input>
							</td>
						</tr>		
					</table>
				</td>
				<td>
					<table class='editRoomTable'>
						
						<tr>
							<td>
								Room Code:
							</td>
							<td id="roomDropdownTd">
								<!--<input type='text' id='room_insert_roomcode2' onkeyup="autopopulateRoomDetails();"></input>-->
							</td>
						</tr>
						
						<tr>
							<td>
								Building Code:
							</td>
							<td>
								<input type='text' id='room_insert_buildingcode2'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Type:
							</td>
							<td>
								<input type='text' id='room_insert_roomtype2'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Capacity:
							</td>
							<td>
								<input type='text' id='room_insert_roomcapacity2'></input>
							</td>
						</tr>
						<tr>
						<td>
							<!--<div id="roomFacilities" class="facilitiesDiv">-->
							<!-- content -->
							<!--</div>-->
						</td>
						</tr>
						
						<tr>
							<td></td>
							<td style='text-align:right;'>
								<input type='button' value='Edit Room' onclick='editRoom();'></input>
							</td>
						</tr>		
					</table>
				</td>
				</tr>
				</table>
				</div>
				
			</label>
			
			<label class='accordionSection settingsCard'>
				<input type='radio' name='settingsAccordion' onclick='settingsRadioToggle(this, 0);'>
					Buildings
				</input>
				
				<div class='accordionContent settingsContent' onclick='return false;'>
				<table class='roomsTable'>
				<tr>
				<td>
					<table class='insertBuildingTable'>
						
						<tr>
							<td>
								Building Code:
							</td>
							<td>
								<input type='text' id='building_insert_buildingcode'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Building Name:
							</td>
							<td>
								<input type='text' id='building_insert_buildingname'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Park:
							</td>
							<td>
								<input type='text' id='building_insert_park'></input>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td style='text-align:right;'>
								<input type='button' value='Insert New Building' onclick='alertBuilding();'></input>
							</td>
						</tr>
						
					</table>
				</td>
				<td>
					<table class='editBuildingTable'>
						
						<tr>
							<td>
								Building Code:
							</td>
							<td>
								<input type='text' id='building_insert_buildingcode'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Building Name:
							</td>
							<td>
								<input type='text' id='building_insert_buildingname'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								Park:
							</td>
							<td>
								<input type='text' id='building_insert_park'></input>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td style='text-align:right;'>
								<input type='button' value='Edit Building' onclick='alertBuilding2();'></input>
							</td>
						</tr>
						
					</table>					
				</td>
				</tr>
				</table>
				</div>
				
			</label>
			
<label class='accordionSection settingsCard'>
				<input type='radio' name='settingsAccordion' onclick='settingsRadioToggle(this, 0);'>
					Facilities
				</input>
				
				<div class='accordionContent settingsContent' onclick='return false;'>
				<table class='facilitiesTable'>
				<tr>
				<td>
					<table class='insertFacilityTable'>
						
						<tr>
							<td>
								Facility Name:
							</td>
							<td>
								<input type='text' id='facilityInsertFacilityName'></input>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td style='text-align:right;'>
								<input type='button' value='Insert New Facility' onclick='alertFacility();'></input>
							</td>
						</tr>		
					</table>
				</td>
				<td>
					<table class='editFacilityTable'>
						
						<tr>
							<td>
								Current Facility Name:
							</td>
							<td>
								<input type='text' id='facilityInsertCurrentFacilityName'></input>
							</td>
						</tr>
						
						<tr>
							<td>
								New Facility Name:
							</td>
							<td>
								<input type='text' id='facilityInsertNewFacilityName'></input>
							</td>
						</tr>
						
						<tr>
							<td></td>
							<td style='text-align:right;'>
								<input type='button' value='Edit Facility' onclick='alertFacility2();'></input>
							</td>
						</tr>		
					</table>
				</td>
				</tr>
				</table>
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
<script type='text/javascript' src='JSViews/settingsScript.js'></script>

</html>