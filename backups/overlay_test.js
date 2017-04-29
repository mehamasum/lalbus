/**
 * Created by USER on 4/30/2017.
 */


var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

/*
// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}
*/
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var autocomplete;
function initialize()
{
    flag=0;
    autocomplete = new google.maps.places.Autocomplete(
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
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();

        console.log(latitude);
        console.log(longitude);

        //getDrivingDistances(latitude,longitude);
        //getDirectDistance(latitude,longitude);
    });
}
