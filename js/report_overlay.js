
var x = document.getElementById("mapholder");
var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];
var placesLong,placesLat;
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {

    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    var latlon = "Latitude: "+position.coords.latitude + "<br>"+ "Longitude: "+ position.coords.longitude +"<br>";

    var map = document.getElementById("mapholder");
    map.innerHTML = latlon;
    sendReport(lat,lng);

}

function sendReport(lat,lng)
{
    var bus = document.getElementsByName("bus")[0].value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = this.responseText;

            console.log(reply);

            if (reply.indexOf("ONE") != -1) {
                window.location.href = "home";
            }
            else {
                map.innerHTML += "Something went wrong" + "<br>";
            }

        }
    };
    xhttp.open("POST", "backend/report_receiver.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("u=<?php echo $_SESSION['id'];?>&b="+bus+"&lat="+lat+"&lng="+lng);

}

function showError(error) {

    initModal();
    modal.style.display = "block";
    switch(error.code) {
        case error.PERMISSION_DENIED:
            //x.innerHTML = "User denied the request for Geolocation.";
            //modal.style.display = "block";
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable.";
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out.";
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred.";
            break;
    }
}

function setPlaces()
{
    sendReport(placesLat,placesLong);
}

function initModal()
{
    span.onclick = function() {
        modal.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    flag=0;
    var autocomplete = new google.maps.places.Autocomplete(
            /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode'],componentRestrictions: {country: "bd"}});
        google.maps.event.addListener(autocomplete, 'place_changed', function()
        {
            try {
                var place = autocomplete.getPlace();
            }
            catch (e) {
                return;
                //logMyErrors(e); // pass exception object to error handler
            }
            placesLat= place.geometry.location.lat();
            placesLong = place.geometry.location.lng();
            var latlon = "Latitude: "+placesLat + "<br>"+ "Longitude: "+ placesLong +"<br>";
            console.log(placesLat);
            console.log(placesLong);
            var map = document.getElementById("placesholder");
            map.innerHTML = latlon;

            //getDrivingDistances(latitude,longitude);
            //getDirectDistance(latitude,longitude);
        });
}