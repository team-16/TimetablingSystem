<html>

<style type='text/css'>

.graphicaTest
{
	position:relative;
	top:40px;
	margin-left:10px;
	height:auto;
	width:940px;
	
	margin-top:10px;
	
	border:1px solid #bbb;

}

</style>

<script type='text/javascript' src='JS/weeksManipulator.js'></script>
<script type='text/javascript'>


function readReq(){
	
	alert(requestArray[0].id + " : " + requestArray[0].moduleCode);
	
	alert(requestArray[0].priority + " : " + requestArray[0].traditional);
	
}

function genGr() {
	//setupSessionData();
	var graphicalHTML = graphicalViewGenerator(requestArray, true, true, true, true, true, true, true, true);
	
	document.getElementById('graphicalContentTest').innerHTML = graphicalHTML;	
	
}


</script>

<button type='button' onclick='readReq();'> Test</button>
<button type='button' onclick='genGr();'> Generate</button>

<div class='graphicalContainer'>
	
	<div class='timetableHeadings'>
		
		<table class='timeHeaderTable'>
			
			<tr>
				
				<td>
					1
				</td>
				
				<td>
					2
				</td>
				
				<td>
					3
				</td>
				
				<td>
					4
				</td>
				
				<td>
					5
				</td>
				
				<td>
					6
				</td>
				
				<td>
					7
				</td>
				
				<td>
					8
				</td>
				
				<td>
					9
				</td>
				
			</tr>
			
		</table>
	
	</div>
	
	
	<div class='sectionContainer'>
		
		<div class='dayTitle'>
			<span style='line-height: 50px;'>Wednesday</span>
		</div>
		
		<div class='sectionAccordion'>
		
			<table class='dayTable'>
				
				<tr>
				
				
					<td id='hiddenTD'>
						
					</td>
				
					<td id='hiddenTD'>
						
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
					
					<td id='hiddenTD'>
						
					</td>
					
				</tr>
				
				<tr>
				
				
					<td>
						<label class='radioLabel'>
							<input type='radio' name='mondayRadio' onclick='graphicalRadioToggle(this, 0);showGraphicalContent(this, "mondayContent1", 0);'></input>
							COB123
						</label>
					</td>
				
					<td colspan='2'>
						<label  class='radioLabel'>
							<input type='radio' name='mondayRadio' onclick='graphicalRadioToggle(this, 0);showGraphicalContent(this, "mondayContent2", 0);'></input>
						</label>
					</td>
				
					<td>
					
					</td>
				
					<td>
					5
					</td>
				
					<td>
					6
					</td>
				
					<td>
					7
					</td>
				
					<td>
					8
					</td>
				
					<td>
					9
					</td>
					
				</tr>
				
			</table>
			
			<div class='contentSection' id='mondayContent1'>
			
				<div class='topContentSection'>
				
					<table class='sectionContentTopTable'>
						
							<tr>
						
								<td class='titleCellTop'>
									Title
								</td>
						
								<td>
									Test Module Title
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Allocated Room(s)
								</td>
						
								<td>
									J.0.01
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Room Preference(s)
								</td>
						
								<td>
									J.0.01, J.0.02
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Weeks
								</td>
						
								<td>
									1-2, 4-5, 7-8, 10-11, 13-14, 16
								</td>
							
							</tr>
						
					</table>
				
					<table class='graphicalBtnsTable'>
					
						<tr>
					
							<td>
								<button type='button' onclick='return false;'>Edit</button>
							</td>
					
							<td>
								<button type='button' onclick='return false;'>Delete</button>
							</td>
					
						</tr>
					
						<tr>
							<td colspan='2'>
								<button type='button' onclick='return false;'>Duplicate</button>
							</td>
						</tr>
					
					</table>
					
				</div>
				
				<table class='sectionContentTable'>
					
					<tr>
						
						<td id='statusSection'>
							Status
						</td>
						
						<td id='pSection'>
							Priority
						</td>
					
						<td id='stuSection'>
							# of Students
						</td>
						
						<td id='roomNumberSection'>
							# of Rooms
						</td>
						
						<td id='tradSection'>
							Traditional
						</td>
						
						<td id='sessSection'>
							Session Type
						</td>
					
						<td id='parkSection'>
							Park
						</td>
					
					</tr>
					
					
					<tr>
						
						<td>
							Allocated
						</td>
						
						<td>
							Yes
						</td>
					
						<td>
							120
						</td>
						
						<td>
							1
						</td>
					
						<td>
							T
						</td>
						
						<td>
							Lecture
						</td>
					
						<td>
							Central
						</td>
						
					</tr>
						
				</table>
												
				<table class='sectionContentTable' style='margin-bottom:5px;'>
				
					<tr>
						
						<td id='faciSection'>
							Facilites
						</td>
						
						<td>
							Other Requirements
						</td>
						
					</tr>
					
					<tr>
						
						<td>
							list
						</td>
						
						<td>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Cras facilisis tellus vitae lacinia porta. 
							In in nunc turpis. Suspendisse luctus ipsum a nisi consequat porttitor.
						</td>
						
					</tr>
					
				</table>
				
				
			</div>
			
			<div class='contentSection' id='mondayContent2'>
				Test
			</div>
			
		</div>
		<div class='sectionAccordion'>
		
			<table class='dayTable'>
				
				<tr>
				
				
					<td id='hiddenTD'>
						
					</td>
				
					<td id='hiddenTD'>
						
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
				
					<td id='hiddenTD'>
					
					</td>
					
					<td id='hiddenTD'>
						
					</td>
					
				</tr>
				
				<tr>
				
				
					<td>
						<label class='radioLabel'>
							<input type='radio' name='mondayRadio' onclick='graphicalRadioToggle(this, 0);showGraphicalContent(this, "mondayContent3", 0);'></input>
							COB123
						</label>
					</td>
				
					<td>
					2	
					</td>
					
					<td>
					3	
					</td>
					
					<td>
					4
					</td>
				
					<td>
					5
					</td>
				
					<td>
					6
					</td>
				
					<td>
					7
					</td>
				
					<td>
					8
					</td>
				
					<td>
					9
					</td>
					
				</tr>
				
			</table>
			
			<div class='contentSection' id='mondayContent3'>
			
				<div class='topContentSection'>
				
					<table class='sectionContentTopTable'>
						
							<tr>
						
								<td class='titleCellTop'>
									Title
								</td>
						
								<td>
									Test Module Title
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Allocated Room(s)
								</td>
						
								<td>
									J.0.01
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Room Preference(s)
								</td>
						
								<td>
									J.0.01, J.0.02
								</td>
							
							</tr>
						
							<tr>
						
								<td  class='titleCellTop'>
									Weeks
								</td>
						
								<td>
									1-2, 4-5, 7-8, 10-11, 13-14, 16
								</td>
							
							</tr>
						
					</table>
					
					<table class='graphicalBtnsTable'>
					
						<tr>
					
							<td>
								<button type='button' onclick='return false;'>Edit</button>
							</td>
					
							<td>
								<button type='button' onclick='return false;'>Delete</button>
							</td>
					
						</tr>
					
						<tr>
							<td colspan='2'>
								<button type='button' onclick='return false;'>Duplicate</button>
							</td>
						</tr>
					
					</table>
					
				</div>
				
				<table class='sectionContentTable'>
					
					<tr>
						
						<td id='statusSection'>
							Status
						</td>
						
						<td id='pSection'>
							Priority
						</td>
					
						<td id='stuSection'>
							# of Students
						</td>
						
						<td id='roomNumberSection'>
							# of Rooms
						</td>
						
						<td id='tradSection'>
							Traditional
						</td>
						
						<td id='sessSection'>
							Session Type
						</td>
					
						<td id='parkSection'>
							Park
						</td>
					
					</tr>
					
					
					<tr>
						
						<td>
							Allocated
						</td>
						
						<td>
							Yes
						</td>
					
						<td>
							120
						</td>
						
						<td>
							1
						</td>
					
						<td>
							T
						</td>
						
						<td>
							Lecture
						</td>
					
						<td>
							Central
						</td>
						
					</tr>
						
				</table>
												
				<table class='sectionContentTable' style='margin-bottom:5px;'>
				
					<tr>
						
						<td id='faciSection'>
							Facilites
						</td>
						
						<td>
							Other Requirements
						</td>
						
					</tr>
					
					<tr>
						
						<td>
							list
						</td>
						
						<td>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Cras facilisis tellus vitae lacinia porta. 
							In in nunc turpis. Suspendisse luctus ipsum a nisi consequat porttitor.
						</td>
						
					</tr>
					
				</table>
				
				
			</div>
			
			<div class='contentSection' id='mondayContent2'>
				Test
			</div>
			
		</div>
	</div>
	
</div>

<div class='graphicalContainer' id='graphicalContentTest' style='margin-top:50px;'>

</div>


</html>