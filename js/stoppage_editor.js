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
    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(22.845765, 89.302069),
        new google.maps.LatLng(24.789119, 91.258215));

    bus_initialize("bus");
    var autocomplete = new google.maps.places.SearchBox((document.getElementById('autocomplete')),{bounds: defaultBounds});



    autocomplete.addListener('places_changed', function() {
        var places = autocomplete.getPlaces();

        if (places.length == 0) {
            return;
        }
        places.forEach(function(place) {
            placesLat= place.geometry.location.lat();
            placesLong = place.geometry.location.lng();

            document.getElementsByName('latitude')[0].value=placesLat;
            document.getElementsByName('longitude')[0].value=placesLong;
        });
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
    console.log(placesLat+" "+placesLong);
}







