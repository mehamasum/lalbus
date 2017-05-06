/**
 * Created by USER on 5/6/2017.
 */
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
    var bus_header=document.getElementById("bus_header");
    var bus=document.getElementsByName("bus")[0];
    var stoppage=document.getElementsByName("stoppage_name")[0];
    var stoppage_type=document.getElementsByName("stoppage_type")[0];
    var remarks=document.getElementsByName("remarks")[0];
    var lat=document.getElementsByName('lat')[0];
    var lng=document.getElementsByName('lng')[0];
    NProgress.start();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data=JSON.parse(this.responseText)['item'];
            NProgress.done();
            lat.value=data['lat'];
            lng.value=data['lng'];
            stoppage.value=data['name'];
            bus.value=data['bus_id'];
            bus_header.innerHTML="For "+data['bus_name'];
            stoppage_type.value=data['stoppage_type'];
            remarks.value=data['remarks'];
        }
    };
    xhttp.open("POST", "backend/stoppage_provider.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('s_id='+schedule_id);

}

function validateStoppageEdit()
{
    var bus=document.getElementsByName("bus")[0].value;
    var stoppage=document.getElementsByName("stoppage_name")[0].value;
    var stoppage_type=document.getElementsByName("stoppage_type")[0].value;
    var remarks=document.getElementsByName("remarks")[0].value;
    var lat=document.getElementsByName('lat')[0].value;
    var lng=document.getElementsByName('lng')[0].value;
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
    xhttp.send("bus_id="+bus+"&stoppage_name="+stoppage+"&lat="+lat+"&lng="+lng+"&stoppage_type="+stoppage_type+"&remarks="+remarks+"&update_type=0");

}


function showAlert() {
    $("#success-alert").alert();
    $("#success-alert").fadeTo(1500, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        window.location.href = "home";
    });
}








