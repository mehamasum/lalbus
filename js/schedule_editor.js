/**
 * Created by USER on 4/27/2017.
 */


function setValue() {

    var time = document.getElementsByName("time")[0];
    var trip_type = document.getElementsByName("trip_type")[0];
    var driver = document.getElementsByName("driver")[0];
    var bus_no = document.getElementsByName("bus_no")[0];
    var endpoint = document.getElementsByName("endpoint")[0];
    var comment = document.getElementsByName("notes")[0];

    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");

    errors.innerHTML="";
    var found =false;

    content.style.display = "none";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //this.responseText;
            var reply =this.responseText;
            console.log(reply);

            if( reply.indexOf("UNAUTHORIZED")!=-1)
            {
                console.log("UNAUTHORIZED ACCESS");
                errors.innerHTML="You don't have permission to edit this schedule"+ "<br>";
            }
            else
            {
                var data=JSON.parse(reply)['item'];
                time.value=data['time'];
                trip_type.value=data['trip_type'];
                driver.value=data['driver'];
                bus_no.value=data['bus_number'];
                endpoint.value=data['endpoint'];
                comment.value=data['comment'];

            }

            if (found)
                content.style.display = "block";
            else {
                content.style.display = "none";

            }
        }
    };
    xhttp.open("POST", "backend/schedule_provider.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //console.log(bus);

    xhttp.send("id="+schedule_id+"&m="+mode+"&b="+bus_id);
}

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
                window.location.href = "admin_schedule";
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





