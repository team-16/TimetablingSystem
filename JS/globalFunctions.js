function htmlStringFormater(stringArray, newLine){
	
	var roomsString = "";
	
	for (var roomCounter = 0;  roomCounter < stringArray.length; roomCounter++){
	
		roomsString += stringArray[roomCounter];
		
		if (roomCounter != (stringArray.length - 1)){
		
			if(newLine) roomsString += "</br>";
			else roomsString += "\xa0 \xa0 \xa0 , \xa0 \xa0 \xa0";
			
		}
		
	}
	
	return roomsString;
	
}

function datetimeStringConverter(dateString) {
	
	var dateTime = dateString.split(" ");
	var date = dateTime[0].split("-");
	var time = dateTime[1].split(":");
	
	var dateObject = new Date(date[0], date[1] - 1, date[2], time[0], time[1], time[2]);
	
	return dateObject;
	
}