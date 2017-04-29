/**
 * Created by USER on 4/30/2017.
 */

var buses=[];
function  initialize() {

    var bus_input = document.getElementsByName('bus')[0];
    var bus_dataList = document.getElementById('buslist');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var reply = JSON.parse(this.responseText);
            reply[0].forEach(function(item) {
                var option = document.createElement('option');
                option.value = item['name'];
                //var obj={"id":item["id"], "name":item["name"], "route":item["route"]};
                buses.push(option.value);
                bus_dataList.appendChild(option);
            });

        } else {
            bus_input.innerHTML="Couldn't load List of buses :(";
        }
    };
    bus_input.innerHTML = "Loading options...";
    xhttp.open("POST", "backend/bus_list.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}

function validate()
{
    var bus = document.getElementsByName("bus")[0].value;
    var errors = document.getElementById("errorMessages");
    var bus_id=0;
    if(buses.indexOf(bus)==-1)
    {
        errors.innerHTML+= "Invalid Bus Name"+"<br>";
    }
    else
        bus_id=buses.indexOf(bus)+1;
}