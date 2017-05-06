/**
 * Created by USER on 5/7/2017.
 */
function initialize()
{
    var bus_name_input=document.getElementsByName("bus_name")[0];
    var route_input=document.getElementsByName("route")[0];
    if(mode==0)
    {
        bus_name_input.value=bus_name;
        route_input.value=route;
    }
}

function validateBusEdit()
{
    var bus_name_input=document.getElementsByName("bus_name")[0].value;
    var route_input=document.getElementsByName("route")[0].value;
    var remarks=document.getElementsByName("remarks")[0].value;
    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");
    var found = false;

    errors.innerHTML="";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = this.responseText;
            console.log(reply);
             if (reply.indexOf("ERR") != -1){
                found = true;
                errors.innerHTML += "Something went wrong" + "<br>";
            }
            else
             {
                 showAlert();
             }
        }
    };
    xhttp.open("POST", "backend/bus_editor_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //console.log(bus);
    xhttp.send("id="+bus_id+"&mode="+mode+"&route="+route_input+"&remarks="+remarks+"&name="+bus_name_input);
}


function showAlert() {
    $("#success-alert").alert();
    $("#success-alert").fadeTo(800, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        window.location.href = "home";
    });
}


