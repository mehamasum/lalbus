/**
 * Created by USER on 5/6/2017.
 */
//id	stoppage_name	lat	lng	bus_id	stoppage_type	remarks	user_id	requested_on

/**
 * Created by USER on 4/27/2017.
 */

var buses=[];

function initialize()
{
    bus_initialize("bus");

    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(22.845765, 89.302069),
        new google.maps.LatLng(24.789119, 91.258215));
    var autocomplete = new google.maps.places.SearchBox((document.getElementById('autocomplete')),{bounds: defaultBounds});



    autocomplete.addListener('places_changed', function() {
        var places = autocomplete.getPlaces();

        if (places.length == 0) {
            return;
        }
        var place=places[0];

        placesLat= place.geometry.location.lat();
        placesLong = place.geometry.location.lng();

        document.getElementsByName('latitude')[0].value=placesLat;
        document.getElementsByName('longitude')[0].value=placesLong;
    });

}

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



function validateScheduleEdit()
{
    var bus_id=document.getElementsByName("bus")[0].value;
    var stoppage=document.getElementById("autocomplete").value;
    var latitude=document.getElementsByName("latitude")[0].value;
    var longitude=document.getElementsByName("longitude")[0].value;
    var stoppage_type=document.getElementsByName("stoppage_type")[0].value;
    var remarks=document.getElementsByName("remarks")[0].value;
    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");
    errors.innerHTML="";
    var found =false;


    content.style.display = "none";
    NProgress.start();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = this.responseText;
            NProgress.done();
            console.log(reply);
            console.log(reply.indexOf("ZERO"));
            console.log(reply.indexOf("ONE"));


            if (reply.indexOf("ZERO") != -1) {
                found = true;
                errors.innerHTML += "Update Failed" + "<br>";
            }
            else if (reply.indexOf("ONE") != -1) {
                showAlert();
            }
            else {
                found = true;
                errors.innerHTML += "Something went wrong" + "<br>";
            }

            if (found)
                content.style.display = "block";
            else {
                content.style.display = "none";

            }
        }
    };
    xhttp.open("POST", "backend/stoppage_editor_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //console.log(bus);
    xhttp.send("bus_id="+bus_id+"&stoppage_name="+stoppage+"&lat="+latitude+"&lng="+longitude+"&stoppage_type="+stoppage_type+"&remarks="+remarks+"&update_type=1");

}


function showAlert() {
    $("#success-alert").alert();
    $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        window.location.href = "home";
    });
}








