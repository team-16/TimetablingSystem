 function addcheckboxes() {
                    var parentElement = document.getElementById("time");
                    var fullHTML1 = "";
                    var originalhtml = parentElement.innerHTML;
                    alert("1");
                    for(var i=0; i < numberOfWeeks; i++)
                    {
                        var newCheckBox = "<input ";
                        newCheckBox += "type='checkbox' ";
                        //alert("2");
                        newCheckBox += "id='" + i + "' ";
                        //alert("3");
                        newCheckBox += "/>" + (i+1);

                        fullHTML1 += newCheckBox;

                        //alert("4");
                    }
                   
                   	alert(fullHTML1);
                    document.getElementById("time").innerHTML = originalhtml + fullHTML1;
                    //alert("5");
            }

function facilityGenerator() {
    testFacilities();
    var parentElement = document.getElementById("facilities");
    var fullHTML ="";
    var oldhtml= parentElement.innerHTML;
    for (var i = 0; i < facilitiesArray.length; i++) {
        var newfacility = "<input ";
            newfacility += "type='checkbox'";
            newfacility += "id = '" + facilitiesArray[i].id + " ' ";
            newfacility += "/> " + facilitiesArray[i].name;
            fullHTML += newfacility;
    }
     document.getElementById("facilities").innerHTML = oldhtml + fullHTML;
}
