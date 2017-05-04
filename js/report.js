/**
 * Created by USER on 5/4/2017.
 */
var x = document.getElementById("mapholder");

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
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation.";
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