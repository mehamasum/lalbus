/**
 * Created by USER on 4/27/2017.
 */

var depts=[];
var buses=[];

 var bus_default;
 var dept_default;
 var id;

function init_fields()
{
    var user_level_input=document.getElementsByName('committee')[0];
    var name = document.getElementsByName("name")[0];
    var reg_no = document.getElementsByName("reg_no")[0];
    var mob_no = document.getElementsByName("mob_no")[0];
    var email = document.getElementsByName("email")[0];
    var repu= document.getElementById("repu");
    console.log(repu);

    NProgress.start();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data=JSON.parse(this.responseText)['item'];
            console.log(data);
            bus_default=data['bus_id'];
            dept_default=data['dept_id'];
            id=data['id'];

            name.value=data['name'];
            reg_no.value=data['reg_no'];
            mob_no.value=data['mob_no'];
            email.value=data['email'];
            user_level_input.value=data['level'];
            repu.innerHTML="Reputation Points : "+data['pos_repu'];
            initialize_lists();
        }
    };
    xhttp.open("POST", "backend/profile_provider.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();
}


function  initialize_lists() {

    var dept_input = document.getElementsByName('dept_name')[0];
    var dept_dataList = document.getElementById('deptlist');
    var bus_input = document.getElementsByName('bus')[0];
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            NProgress.done();
            var reply = JSON.parse(this.responseText);

            reply[0].forEach(function(item) {
                var option = document.createElement('option');
                option.value = item['name']+"( "+item['short_name']+" ) ";
                //var obj={"id":item["id"], "name":item["name"], "short_name":item["short_name"]};
                depts.push(option.value);
                dept_dataList.appendChild(option);

            });

            if(dept_default!=0)
                dept_input.value=depts[dept_default-1];

            reply[1].forEach(function(item) {
                var option = document.createElement('option');
                option.value = item['id'];
                option.text=item['name'];
                //var obj={"id":item["id"], "name":item["name"], "route":item["route"]};
                buses.push(option.value);
                bus_input.appendChild(option);
            });


            if(bus_default!=0)
                bus_input.value=buses[bus_default-1];

        } else {
            dept_input.innerHTML = "Couldn't load List of buses :(";
            bus_input.innerHTML="Couldn't load List of buses :(";
        }
    };
    dept_input.innerHTML  = "Loading options...";
    bus_input.innerHTML = "Loading options...";
    xhttp.open("POST", "backend/dept_bus_list.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send();

}

function validateUpdate() {

    var name = document.getElementsByName("name")[0].value;
    var reg_no = document.getElementsByName("reg_no")[0].value;
    var mob_no = document.getElementsByName("mob_no")[0].value;
    var email = document.getElementsByName("email")[0].value.toLowerCase();
   // var password = document.getElementsByName("password")[0].value;
    var comm = document.getElementsByName("committee")[0].value;
    var bus = document.getElementsByName("bus")[0].value;
    var deptname=document.getElementsByName("dept_name")[0].value;
    var bus_id, dept_id;
    var content = document.getElementById("errorMessageContent");
    var errors = document.getElementById("errorMessages");
    var success=document.getElementById("success-alert");
    var found = false;

    if(name.length<3) {
        found = true;
        errors.innerHTML+= "Name too short"+"<br>";
    }

    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(email)) {
        found = true;
        errors.innerHTML+= "Invalid Email"+"<br>";
    }

    if(depts.indexOf(deptname)==-1)
    {
        found=true;
        errors.innerHTML+="Invalid Department Name"+"<br>";
    }
    else
        dept_id=depts.indexOf(deptname)+1;


    if(!isInteger(mob_no) || !isBDMob(mob_no)) {
        found = true;
        errors.innerHTML+= "Invalid Mobile Number"+"<br>";
    }

    if(found)
        content.style.display = "block";
    else {
        content.style.display = "none";
        NProgress.start();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            NProgress.done();
            if (this.readyState == 4 && this.status == 200) {
                //this.responseText;
                var reply = this.responseText;

                console.log(reply);
                console.log(reply.indexOf("ZERO"));
                console.log(reply.indexOf("ONE"));


                if (reply.indexOf("ZERO") != -1) {
                    found = true;
                    errors.innerHTML += "Registration Number already in use" + "<br>";
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
        xhttp.open("POST", "backend/profile_handler.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //console.log(bus);

        xhttp.send("n="+name+"&r="+reg_no+"&m="+mob_no+"&c="+comm+"&b="+bus_id+"&d="+dept_id+"&id="+id+"&e="+email);
    }
}

function showAlert() {
    $("#success-alert").alert();
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
        window.location.href = "home";
    });
}