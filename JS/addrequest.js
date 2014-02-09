 function addcheckboxes() {
                    var parentElement = document.getElementById("time");
                    var fullHTML1 = "";
                    var originalhtml = parentElement.innerHTML;
                    alert("1");
                    for(var i=1; i < numberOfWeeks; i++)
                    {
                        var newCheckBox = "<input ";
                        newCheckBox += "type='checkbox' ";
                        //alert("2");
                        newCheckBox += "id=' week " + i + "' ";
                        if (i<=12) {
                          newCheckBox += "checked";  
                        };
                        //alert("3");
                        newCheckBox += "/>" + (i);

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
function selectDeselectAll(){
    alert("1")
    var checked = false;
    for (var i = 1; i < numberOfWeeks; i++) {
     var checkbox = document.getElementById("week " + i);
        if (checked) {
            alert("2")
            checkbox.checked = true;
        }else{
            checkbox.checked = false;
        }
    }
}