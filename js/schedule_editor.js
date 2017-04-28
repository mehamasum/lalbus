/**
 * Created by USER on 4/27/2017.
 */
function validateScheduleEdit() {

    var time = document.getElementsByName("time")[0].value;
    var trip_type = document.getElementsByName("trip_type")[0].value;
    var driver = document.getElementsByName("driver")[0].value;
    var bus_no = document.getElementsByName("bus_no")[0].value;
    var endpoint = document.getElementsByName("endpoint")[0].value;
    var comment = document.getElementsByName("notes")[0].value;

    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");

    errors.innerHTML="";
    var found =false;

    content.style.display = "none";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply = this.responseText;

            console.log(reply);
            console.log(reply.indexOf("ZERO"));
            console.log(reply.indexOf("ONE"));


            if (reply.indexOf("ZERO") != -1) {
                found = true;
                errors.innerHTML += "Update Failed" + "<br>";
            }
            else if (reply.indexOf("ONE") != -1) {
                window.location.href = "schedule_edit";
            }
            else if( reply.indexOf("UNAUTHORIZED")!=-1)
            {
                console.log("UNAUTHORIZED ACCESS");
                parent.innerHTML="You don't have permission to edit this schedule"+ "<br>";
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
    xhttp.open("POST", "backend/schedule_editor_handler.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //console.log(bus);

    xhttp.send("time="+time+"&trip_type="+trip_type+"&driver="+driver+"&bus_no="+bus_no+"&endpoint="+endpoint+"&comment="+comment+"&id="+schedule_id+"&mode="+mode+"&bus_id="+bus_id);
}




