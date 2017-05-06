/**
 * Created by USER on 4/24/2017.
 */

var buses = [];
var stoppages=[];
var distance=[];
var flag;
var autocomplete;

function initialize()
{
    loadPlaces();
    flag=0;

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

        getDirectDistance(placesLat,placesLong);
    });

}

function DeleteRows() {
    var stopList=document.getElementById("tblStop");
    var rowCount = stopList.rows.length;
    for (var i = rowCount - 1; i > 0; i--) {
        stopList.deleteRow(i);
    }
}

function getDistance(lat1, lon1, lat2, lon2) {
    var p = 0.017453292519943295;    // Math.PI / 180
    var c = Math.cos;
    var a = 0.5 - c((lat2 - lat1) * p)/2 +
        c(lat1 * p) * c(lat2 * p) *
        (1 - c((lon2 - lon1) * p))/2;
    var numb = 12742 * Math.asin(Math.sqrt(a)); // 2 * R; R = 6371 km
    return numb.toFixed(2);
}


function getDirectDistance(latitude,longitude)
{
    var i;
    distance=[];
    //console.log(stoppages.length);
    for(i=0; i<stoppages.length; i++) {

        var d= getDistance(latitude,longitude,stoppages[i].lat,stoppages[i].lng)
        //console.log(d);
        distance.push(d);
    }
    sendResults();
}

function sendResults()
{
    var parent = document.getElementById("buslist");
    var busstoppage=[];
    var i;

    for(i=0;i<stoppages.length;i++)
    {
        var bus_id=stoppages[i].bus_id;
        var bus_name=buses[bus_id-1].name;

        var obj={"name":stoppages[i].name, "bus":bus_name, "distance":distance[i]};
        busstoppage.push(obj);
        //console.log(obj);
        //console.log(i+" "+distance[i]+" "+stoppages[i].name);
    }
    Array.prototype.sortOn = function(key){
        this.sort(function(a, b){
            if(a[key] < b[key]){
                return -1;
            }else if(a[key] > b[key]){
                return 1;
            }
            return 0;
        });
    }
    busstoppage.sortOn("distance");
    DeleteRows();
    for(i=0;i<busstoppage.length && i<10;i++)
    {
        var obj=busstoppage[i];
        parent.innerHTML+="<tr><td>"+obj.name+"</td><td>"+obj.bus+"</td><td>"+obj.distance+"</td></tr>";

    }

}


function loadPlaces()
{
    NProgress.start();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            //console.log(this.responseText);
            NProgress.done();
            var reply = JSON.parse(this.responseText);
            //console.log(reply[0]);
            var idx;
            for( idx=0; idx<reply[0].length; idx++) {
                var d=reply[0][idx];
                var obj={"id":d["id"],"name":d["stoppage_name"],"lat":d["lat"],"lng":d["lng"],"bus_id":d["bus_id"]};
                stoppages.push(obj);
            }

            //console.log(reply[1]);

            for(idx=0; idx<reply[1].length; idx++) {
                var d = reply[1][idx];
                var obj={"id":d["id"], "name":d["name"], "route":d["route"]};
                buses.push(obj);
            }

        }
    };
    xhttp.open("POST", "backend/search_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}


/*

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


function getDrivingDistances(latitude,longitude)
{
    var directionsService = new google.maps.DirectionsService();
    var latLngA=new google.maps.LatLng(latitude,longitude);
    var i;
    console.log(stoppages.length);
    for(i=0; i<stoppages.length; i++) {

        var latLngB=new google.maps.LatLng(stoppages[i].lat,stoppages[i].lng);
        var request = {
            origin: latLngA,
            destination: latLngB,
            travelMode: google.maps.DirectionsTravelMode.DRIVING
        };

        directionsService.route(request, function (response, status) {
            if (status == 'OK') {
                var d=response.routes[0].legs[0].distance.text;
                console.log(d);
                distance.push(d);
                flag++;
                if(flag==stoppages.length)
                {
                    sendResults();
                }
            }
            else
                console.log("Failed "+status);
        });


    }

}

*/

