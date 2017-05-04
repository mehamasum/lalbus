/**
 * Created by USER on 4/30/2017.
 */

var buses=[];
function  bus_initialize(fieldName) {

    var bus_input = document.getElementsByName(fieldName)[0];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var reply = JSON.parse(this.responseText);
            reply[0].forEach(function(item) {
                var option = document.createElement('option');
                option.value = item['id'];
                option.text=item['name'];
                buses.push(option);
                bus_input.appendChild(option);
                //bus_dataList.appendChild(option);
            });

        } else {
            bus_input.innerHTML="Couldn't load List of buses :(";
        }
    };
    xhttp.open("POST", "backend/bus_list.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}