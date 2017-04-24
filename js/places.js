/**
 * Created by USER on 4/24/2017.
 */

var directionsService = new google.maps.DirectionsService();
var busses = [];
function codeAddress(address)
{
    //myStringArray=["Setara Convention Hall, Begum Rokeya Avenue, Dhaka, Bangladesh"];
    geocoder = new google.maps.Geocoder();
    geocoder.geocode( {'address':address}, function(results, status)
    {

        if (status == google.maps.GeocoderStatus.OK) {
            var latitude = results[0].geometry.location.lat();
            var longitude = results[0].geometry.location.lng();
            console.log(results[0].address_components[0]);
            //console.log(results[0].address_components['longname']);
            console.log(latitude);
            console.log(longitude);
        }

    });

}

function getDistance(lat1, lon1, lat2, lon2) {
    var p = 0.017453292519943295;    // Math.PI / 180
    var c = Math.cos;
    var a = 0.5 - c((lat2 - lat1) * p)/2 +
        c(lat1 * p) * c(lat2 * p) *
        (1 - c((lon2 - lon1) * p))/2;

    return 12742 * Math.asin(Math.sqrt(a)); // 2 * R; R = 6371 km
}

var autocomplete;
function initialize()
{
    loadPlaces();
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
        {types: ['geocode'],componentRestrictions: {country: "bd"}});
    google.maps.event.addListener(autocomplete, 'place_changed', function()
    {
            var place = autocomplete.getPlace();
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();

            console.log(latitude);
            console.log(longitude);

            var latSrc=23.795604;
            var lngSrc=90.353655;
            //var distance=getDistance(latitude, longitude,latSrc,lngSrc);
            //console.log(distance);
            var latLngA=new google.maps.LatLng(latitude,longitude);
            var latLngB=new google.maps.LatLng(latSrc,lngSrc);

            //var dist=google.maps.geometry.spherical.computeDistanceBetween (latLngA, latLngB);
            //console.log(dist);

            var request = {
                origin: latLngA,
                destination: latLngB,
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            };

            directionsService.route(request, function (response, status) {
                if (status == 'OK') {
                    console.log(response.routes[0].legs[0].distance.text);
                }
            });
    });
}

function loadPlaces()
{

    var parent = document.getElementById("buslist");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            console.log(this.responseText);

            var reply = JSON.parse(this.responseText);
            console.log(reply[0]);
            parent.innerHTML=reply[0];
            /*
            var idx;
            for( idx=0; idx<reply[0].length; idx++) {
                following.push(reply[0][idx]["_id"]);
            }*/

            console.log(reply[1]);

            for(idx=0; idx<reply[1].length; idx++) {
                var d = reply[1][idx];
                var obj={"id":d["id"], "name":d["name"], "route":d["route"]};
                busses.push(obj);
            }


            // echo "var obj=$bus_id; following.push(obj);\n";
            // echo "var obj={\"id\":$id, \"name\":'$name', \"route\":'$route'}; busses.push(obj); \n";

            // then add this

            var i=0;
/*
            for(i=0; i<following.length; i++) {
                console.log(following[i]);
            }
*/
            console.log(busses.length);

            for(i=0; i<busses.length; i++) {
                console.log(busses[i]);
                console.log(i);
                console.log(busses.length);
                var b_id = busses[i]["id"];
                var b_name = busses[i]["name"];
                var b_route = busses[i]["route"];
                console.log(b_id+" "+b_name+" "+b_route);
            }

        }
    };
    xhttp.open("POST", "backend/places_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}




