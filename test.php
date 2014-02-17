<?php

include('PHP/init.php');

if(!isLoggedIn()){
	session_destroy();
	redirectLogin();
}

?>

<html>


<style type='text/css'>

.listTest
{
	position:relative;
	top:40px;
	left:10px;
	height:auto;
	width:940px;
	
	margin-top:10px;
	
	border:1px solid #bbb;

}

</style>


<script type='text/javascript' src='JS/weeksManipulator.js'></script>

<script type='text/javascript'>

function weeksTest(){
	
	alert("Decoding 010101011101110");
	
	var ar = weeksDecoder("010101011101110");
	
	if (ar != undefined) {
		
		for(var counter = 0; counter < ar.length; counter++){
			alert("c" + counter + ": " + ar[counter]);
		} 
		
	} else alert("undefined");
	
	
	alert("Encoding [true, false, false, false, true, true, true, false, true, false, false, false, true, false, false]");
	var x = [true, false, false, false, true, true, true, false, true, false, false, false, true, false, false];
	
	var st = weeksEncoder(x);
	
	alert(st);
}

function testReqClass(){
	
	//setupSessionData();
	testFacilites();
	testRequestList();
		
}

function gen(){
	//setupSessionData();
	var listHTML = listViewGenerator(requestArray, true, true, true, true, true, true, true, true, true);
	
	document.getElementById('listContent').innerHTML = listHTML;	
	
	//alert(listHTML);
}

</script>
<button type='button' onclick='$("#requestsNow").click();'>Redirect</button>
<button type='button' onclick='weeksTest();'>Weeks Test</button>
<button type='button' onclick='testReqClass();'>Test</button>
<button type='button' onclick='weekReadableString([true, false, true, true, true, true, false, true, true, true, false, true, false, false, false, false]);'>Test string</button>
<button type='button' onclick='gen();'>Generate</button>

<div class='listTest'>
	
	<table class='listHeadings'>
	
		<tr>
		
			<td id='depField'>
				Dep
			</td>
		
			<td id='codeField'>
				Module Code
			</td>
		
			<td id='pField'>
				P
			</td>
		
			<td id='dayField'>
				Day
			</td>
		
			<td id='periodField'>
				Period
			</td>
		
			<td id='lengthField'>
				Length
			</td>
		
			<td id='weeksField'>
				Weeks
			</td>
		
			<td id='stuField'>
				# of Students
			</td>
		
			<td id='tradField'>
				T/S
			</td>
		
		</tr>
	
	</table>
	
	
	
	<div class='accordion'>

		<label class='accordionSection'>
		
			<input type='checkbox'>
			
				<div class='requestHeaderDiv'>
				
					<table class='requestHeaderTable'>
					
						<tr>
							<td id='depField'>
								CO
							</td>
						
							<td id='codeField'>
								COB123
							</td>
						
							<td id='pField'>
								Yes
							</td>
						
							<td id='dayField'>
								Thursday
							</td>
						
							<td id='periodField'>
								1
							</td>
						
							<td id='lengthField'>
								1
							</td>
						
							<td id='weeksField'>
								1-2, 4-5, 7-8, 10-11, 13-14, 16
							</td>
						
							<td id='stuField'>
								120
							</td>
						
							<td id='tradField'>
								T
							</td>
						
						</tr>
						
						<tr>
						
							<td colspan='3'>
								<u>Allocated Room</u>
							</td>
							
							<td colspan='7'>
								J.0.02
							</td>
							
						</tr>
						
					</table>
				
					<table class='listBtnsTable'>
					
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
				
			<div class='accordionContent requestCardContent'>
			
				<table class='requestContentsTable'>
					
					<tr>
						
						<td id='titleField'>
							Title
						</td>
						
						<td id='sessField'>
							Session Type
						</td>
						
						<td id='parkField'>
							Park
						</td>
						
						<td id='roomNumberField'>
							# of Rooms
						</td>
						
						 <td id='statusField'>
							Status
						</td>
						
					</tr>
					
					<tr>
						
						<td id='titleContentField'>
							Test Module for System
						</td>
						
						<td>
							Lecture
						</td>
						
						<td>
							Central
						</td>
						
						<td>
							1
						</td>
						
						<td>
							Allocated
						</td>
						
					</tr>
					
					
				</table>
				
				</br>
				
				<table class='requestContentsTable' style='margin-bottom:5px;'>
				
					<tr>
						
						<td id='roomPrefField'>
							Room Preference(s)
						</td>
						
						<td id='faciField'>
							Facilites
						</td>
						
						<td id='otherReqsField'>
							Other Requirements
						</td>
						
					</tr>
					
					<tr>
					
						<td>
							J.0.01
							</br>
							J.0.02
						</td>
						
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
			
		</label>
	
		<label class='accordionSection requestCard'>
			<input type='checkbox'>
				<div class='requestHeaderDiv'>
				
					<table class='requestHeaderTable'>
					
						<tr>
							<td id='depField'>
								CO
							</td>
						
							<td id='codeField'>
								COB123
							</td>
						
							<td id='pField'>
								Yes
							</td>
						
							<td id='dayField'>
								Thursday
							</td>
						
							<td id='periodField'>
								1
							</td>
						
							<td id='lengthField'>
								1
							</td>
						
							<td id='weeksField'>
								1-2, 4-5, 7-8, 10-11, 13-14, 16
							</td>
						
							<td id='stuField'>
								120
							</td>
						
							<td id='tradField'>
								T
							</td>
						
						</tr>
						
						<tr>
						
							<td colspan='3'>
								Room Preference
							</td>
							
							<td colspan='7'>
								J.0.02
							</td>
							
						</tr>
						
					</table>
				
					<table class='listBtnsTable'>
					
						<tr>
						
							<td>
								Button A
							</td>
						
							<td>
								Button B
							</td>
						
						</tr>
						
						<tr>
							<td colspan='2'>
								Button C
							</td>
						</tr>
					
					</table>
					
				</div>	
				
			<div class='accordionContent requestCardContent'>
				Content
			</div>
		</label>
	
	</div>
	
</div>



<div id='listContent' class='listTest'>

	
	
</div>

</html>